<?php

namespace App\Repositories;

use Lang;
use Image;
use File;
use Illuminate\Support\Str;

/**
* 
*/
class Repository
{	
	protected $model = false;

	public function getFields($page = null, $column = null, $record = null, $search = null, $order = []) {

        $builder = $this->model->select('*');
        
        if(isset($column) && isset($search)) {
            $builder->where($column, 'like', '%' . $search . '%');
        }
        
        if(!empty($order)) {
            $builder->orderBy($order[0], $order[1]);    
        }

        if($record) {
            $result = $this->check($builder->paginate($record));    

            if($result) {
                return $result->withPath($page);
            }
        }
        
        return $this->check($builder->get());
    }

    protected function check($result){
        
        if($result->isEmpty()){
            return FALSE;
        }

        $result->transform(function($item, $key){
            if(is_string($item->image)
                && is_object(json_decode($item->image))
                && (json_last_error() == JSON_ERROR_NONE)
                ){
                
                $item->image = json_decode($item->image);
            }

            return $item;
        });

        return $result;
    }

    public function one($alias, $attr = []) {
        
        $result = $this->model->where('alias', $alias)->first();

        return $result;
    }

    public function getColumnsHeaderTable($file = null) {
        return Lang::get($file . '.all_columns');
    }

    public function getFormFields($file = null) {
        return Lang::get($file . '.form_fields');
    }

    public function getButtons() {

		$buttons['create'] = Lang::get('buttons.create');
        $buttons['delete'] = Lang::get('buttons.delete');
        $buttons['search'] = Lang::get('buttons.search');
        $buttons['submit'] = Lang::get('buttons.submit');
        $buttons['order']  = Lang::get('buttons.order');
        $buttons['edit']  = Lang::get('buttons.edit');
        $buttons['create-item']  = Lang::get('buttons.create-item');

        return $buttons;
	}

	public function getPagination($page = null, $pages = null, $entiries = null) {

		$paginate['previous'] = Lang::get('pagination.previous'); 
        $paginate['next'] = Lang::get('pagination.next'); 
        $paginate['records'] = Lang::get('pagination.records'); 
        $paginate['entries'] = Lang::get('pagination.entries', [
                                'page' => $page,
                                'pages' => $pages,
                                'entiries' => $entiries
                            ]); 
        return $paginate;
	}

    public function createNrRecords() {
        return config('settings.recordsPerPage');
    }

    public function getRecord() {
        
        $record = \Request::input('records');
        $record = (integer)$record;

        $records_session = \Request::session()->get('set_records');
        
        if((!isset($record)) || ($records_session === null || $records_session == 0)) {
            $record = 10;
            Session(['set_records' => $record]); 
        }
        else if(($records_session != 0 && $record != 0) && $record != $records_session) {
            Session()->put('set_records', $record);
        } else {
            $record = $records_session;
        }

        return $record;
    }

    public function getSearch() {
        // $input = \Request::input('table_search');

        // return 'create';


    } 

    public function getReduceFieldsCheckbox($excepts = []) {

        if(!empty($excepts)) {
            $fields = $this->model->whereNotIn($excepts[0], $excepts[1])->get();    
        } else {
            $fields = $this->model->get();
        }
        

        $fields = $fields->reduce(function($returnFields, $field) {
            
            $returnFields[] = [
                'id' => $field->id,
                'name' => $field->name,
                'display_name' => $field->display_name
            ];

            return $returnFields;
        });

        return $fields;
    }

    public function getReduceSelectFields($where = []) {
        // select info from DB
        $fields = $this->model;
        
        if(!empty($where)){
            $fields = $fields->where($where[0], $where[1]);
        }

        $fields = $fields->get();

        // get reduce array
        $fields = $fields->reduce(function($returnFields, $field) {
            if(isset($field->name)){
                $returnFields[$field->id] = $field->name;
            } elseif(isset($field->title)){
                $returnFields[$field->id] = $field->title;
            }

            return $returnFields;
        });

        return $fields;
    }

    // public function getReduceSelectLinkMenu($order = '') {
    //     // select info from DB
    //     $fields = $this->model;
        
    //     if(isset($order)) {
    //         $fields = $fields->orderBy('created_at', $order);   
    //     }

    //     $fields = $fields->get();

    //     // get reduce array
    //     $fields = $fields->reduce(function($returnFields, $field) {
    //         if(isset($field->name)){
    //             $returnFields[$field->alias] = $field->name;
    //         } elseif(isset($field->title)){
    //             $returnFields[$field->alias] = $field->title;
    //         }

    //         return $returnFields;
    //     });

    //     return $fields;
    // }

    // public function transliterate($string) {
    //     $str = mb_strtolower($string, 'UTF-8');

    //     $str = preg_replace('/(\s|[^A-Za-z0-9\-])+/', '-', $str);
        
    //     $str = trim($str, '-');

    //     return $str;
    // }

    public function resizeAndUploadImage($fields, $path = '') {
        
        if($fields->hasFile('image')) {
            $image = $fields->file('image');
            if($image->isValid()) {
                
                $settings = Config('settings.' . $path);

                $str = Str::random(10);

                $obj = new \stdClass;

                $img = Image::make($image);

                $path = public_path(Config('settings.theme') . '\images\\' . $path);

                if(!File::exists($path)) {
                    File::makeDirectory($path);
                }

                foreach($settings as $key => $set) {
                    $obj->$key = $str . '_' . $key . '.jpg';

                    $img->fit($set['width'],
                            $set['height'])
                        ->save($path . '/' . $obj->$key);     
                }

                return json_encode($obj);
            }       
        }

        return false;
    }

    // public function verificationAlias($fields = [], $model = null) {

    //     $alias = $fields['alias'];
    //     $aliasUssed = false;

    //     if(empty($alias)) {
    //         $alias = $this->transliterate($fields['title']);
    //     } else {
    //         $alias = $this->transliterate($alias);
    //     }

    //     $alias = Str::limit($alias, config('settings.length_alias'), '');

    //     $result = $this->one($alias, FALSE);

    //     if(isset($result->id)) {
    //         $aliasUssed = true;
            
    //         if(isset($model->id)) {
    //             if($result->id != $model->id) {
    //                 $aliasUssed = true; 
    //             } else {
    //                 $aliasUssed = false; 
    //             }
    //         }       
    //     }
        
    //     if($aliasUssed) {
    //         $fields->merge(['alias' => $alias]);
    //         $fields->flash();

    //         return ['error' => 'This alias is ussed!'];
    //     }

    //     return $alias;
    // }

    public function deleteImage($field, $path) {
        $images = json_decode($field['image']);

        $path = public_path(Config('settings.theme') . '\images\\' . $path);
        
        foreach($images as $image) {
            $filename = $path . '/' . $image;
            
            if(file_exists($filename)){
                File::delete($filename);
            }
        }
        return true;
    }

    /**
    * $select - coloanele care se extrag din DB
    * $take - numarul de rinduri care se extrag
    * $order - metoda de ordonare ex. ['created_at', 'desc']
    * $published - este asa coloana in acest tabel
    */ 
    public function getLast($select = '*', $take = 0, $order = [], $published = false) {

        $builder = $this->model->select($select);

        if($published){
            $builder->where('published', 1);
        }

        // if($where) {
        //     $builder->where($where[0], $where[1]);
        // }
        
        if($take){
            $builder->take($take);
        }

        if($order){
            $builder->orderBy($order[0], $order[1]);
        }

        return $this->check($builder->get());
    }
}

?>