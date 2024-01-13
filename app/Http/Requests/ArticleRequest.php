<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create article');
    }

    public function getValidatorInstance() {
        $validator = parent::getValidatorInstance();

        $validator->sometimes('alias', 'unique:articles|max:255', function($input) {

            if($this->route()->hasParameter('article')) {
                $model = $this->route()->parameter('article');
                return ($model->alias !== $input->alias) && !empty($input->alias);
            }
            
            return !empty($input->alias);
        });

        $validator->sometimes('image', 'max:2000', function() {
            if($this->route()->hasParameter('article')) {
                 return false;
            }
            return true;
        });

        return $validator;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            // 'keywords' => 'required|max:255',
            // 'meta_desc' => 'required|max:255',
            'body' => 'required',
            'category_id' => 'required|numeric',
        ];
    }
}
