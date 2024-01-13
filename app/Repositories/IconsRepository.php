<?php

namespace App\Repositories;

use App\Models\Icon;

class IconsRepository extends Repository
{
	public function __construct(Icon $icon) {

		$this->model = $icon;
	}

	public function addIcon($fields) {
		$data = $fields->except('_token');
		
		$this->model->fill($data);

		if($this->model->save()) {
			return ['status' => 'Icon added!'];
		}
	}

	public function updateIcon($fields, $icon) {

		$data = $fields->except('_token', 'method');

		$icon->fill($data);
		
		if($icon->update()) {
			return ['status' => 'Icon updated!'];
		}
	}

	public function deleteIcon($icon) {
		if($icon->delete()) {
			return ['status' => 'Icon deleted!'];
		}
	}
}

?>