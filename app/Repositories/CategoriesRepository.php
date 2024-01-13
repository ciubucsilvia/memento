<?php

namespace App\Repositories;

use App\Models\Category;
use Lang;

class CategoriesRepository extends Repository
{
	public function __construct(Category $category) {

		$this->model = $category;
	}
	
	public function getTypesCategories() {
		return Lang::get('categories.types_categories');
	}

	public function addCategory($request) {
		$fields = $request->except('_token');

		$fields['parent'] = ($fields['type'] == 'article' ? 1 : 2);  
		
		$this->model->fill($fields);

		if($this->model->save()) {
			return ['status' => 'Category ' . $this->model->title . ' added'];
		}
	}

	public function updateCategory($request, $category) {
		$fields = $request->except('_token', '_method');

		$category->fill($fields);

		if($category->update()) {
			return ['status' => 'Category ' . $category->title . ' updated'];
		}
	}

	public function deleteCategory($category) {
		$categoryTitle = $category->title;
		if($category->delete()) {
			return ['status' => 'Category ' . $categoryTitle . ' deleted'];
		}
	}

	public function getLastCategories($type = 'article'){
		$builder = $this->model->select('*')
					->where('type' , $type)
					// ->where('parent', '!=', 0)
					->orderBy('title', 'asc');
		// dd($builder->get());
        return $this->check($builder->get());
	}
}

?>