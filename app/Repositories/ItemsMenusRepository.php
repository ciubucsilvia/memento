<?php

namespace App\Repositories;

use App\Models\Menu;
use Lang;

/**
* 
*/
class ItemsMenusRepository extends Repository
{
	public function __construct(Menu $menu) {
		$this->model = $menu;
	}

	public function addLinktoMenu($request) {

		$fields = $request->except('_token');

		// switch ($fields['custom']) {
		// 	case 'customUser':
		// 		$path = $fields['customUser'];
		// 		break;
		// 	case 'customArticle':
		// 		$path = env('APP_URL') . 'articles/' . $fields['customArticle'];
		// 		break;
		// 	case 'customPortfolio':
		// 		$path = env('APP_URL') . 'portfolios/' . $fields['customPortfolio'];
		// 		break;
		// 	case 'customPage':
		// 		$path = env('APP_URL') . $fields['customPage'];
		// 		break;
		// }

		// if(empty($path)) {
		// 	return ['error' => 'Path is error'];
		// }

		if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $fields['path'])) {

			$fields['path'] = env('APP_URL') . '/' . $fields['path'];
		}

		$this->model->fill($fields);

		if($this->model->save()) {
			return ['status' => 'Item menu added'];
		}
	}

	public function editLinktoMenu($request, $menu) {

		$fields = $request->except('_token', '_method');

		if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $fields['path'])) {

			$fields['path'] = env('APP_URL') . '/' . $fields['path'];
		}

		$menu->fill($fields);

		if($menu->update()) {
			return ['status' => 'Item menu updated'];
		}
	}

	public function deleteLinktoMenu($menu) {
		if($menu->delete()) {
			return ['status' => 'Item menu deleted'];
		}
	}
}

?>