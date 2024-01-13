<?php

namespace App\Repositories;

use App\Models\ItemsMenu;
use App\Models\Menu as ModelsMenu;
use Menu;
/**
* 
*/
class MenusRepository extends Repository
{
	public function __construct(ModelsMenu $menu) {
		$this->model = $menu;
	}

	public function addMenu($request) {

		$fields = $request->except('_token');

		$this->model->fill($fields);

		if($this->model->save()) {
			return ['status' => 'Menu ' . $this->model->title . ' added'];
		}
	}

	public function editMenu($request, $menu) {

		$fields = $request->except('_token', '_method');

		$menu->fill($fields);

		if($menu->update()) {
			return ['status' => 'Menu ' . $menu->title . ' updated'];
		}
	}

	public function deleteMenu($menu) {
		$menuTitle = $menu->title;
		
		$menu->items()->delete();		

		if($menu->delete()) {
			return ['status' => 'Menu ' . $menuTitle . ' deleted'];
		}
	}

	public function addItemMenu($request) {

		$fields = $request->except('_token');

		$item = new ItemsMenu($fields);

		$menu = $this->model::find($fields['menu_id']);
		
		if($menu->items()->save($item)) {
			return ['status' => 'Menu item ' . $this->model->title . ' added'];
		}
	}

	public function editItemMenu($request, $id) {

		$fields = $request->except('_token');

		$item = ItemsMenu::find($id);
		$item->fill($fields);
		
		if($item->update()) {
			return ['status' => 'Menu item ' . $item->title . ' updated'];
		}
	}

	public function deleteItemMenu($id) {
		$item = ItemsMenu::find($id);

		$this->deleteChildrenItems($item->id);

		if($item->delete()) {
			return ['status' => 'Item menu ' . $item->title . ' deleted'];
		}
	}

	public function deleteChildrenItems($id) {
		$ids_items = ItemsMenu::where('parent', $id)->get();
		foreach($ids_items as $item_p){
			$item_p->delete();
			$this->deleteChildrenItems($item_p->id);
		}
		return true;
	}

	public function getMenus($menu) {

        $items = $menu->items;
        
        if($items->isEmpty()) {
            return FALSE;
        }

        return Menu::make('forMenuPart' . $menu->id, function($m) use ($items) {
            foreach($items as $item) {
                if($item->parent == 0) {
                    $m->add($item->title, $item->path)->id($item->id);
                } else {
                    if($m->find($item->parent)) {
                        $m->find($item->parent)->add($item->title, $item->path)->id($item->id);
                    }
                }
            }
        });
    }

    public function getMenuItems($parents) {
	    $parents = $parents->reduce(function($returnMenus, $item) {

            $returnMenus[$item->id] = $item->title;

            return $returnMenus;

        }, ['0' => 'Parent item menu']);

        return $parents;
    }

    public function getMenuWithItems($name) {
    	$menu = $this->model->where('title', $name)->get()->first();
    	
    	if(isset($menu->items)){
    		return $menu->items;
    	}
    	return [];
    }
}

?>