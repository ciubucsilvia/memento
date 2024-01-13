<?php

namespace App\Repositories;

use Spatie\Permission\Models\Permission;

class PermissionsRepository extends Repository
{
	public function __construct(Permission $permission) {

		$this->model = $permission;
	}

	public function addPermision($fields) {

		$data = $fields->except('_token');

		$this->model->fill($data);

		if($this->model->save()) {
			return ['status' => 'Permission ' . $this->model->display_name . ' added!'];
		}				
	}

	public function updatePermissions($fields, $permission) {

		$data = $fields->except('_token');
		
		$permission->fill($data);

		if($permission->update()) {
			return ['status' => 'Permission ' . $permission->display_name . ' updated!'];
		}
	}
}

?>