<?php

namespace App\Repositories;

use Spatie\Permission\Models\Role;
use DB;

class RolesRepository extends Repository
{
	public function __construct(Role $role) {

		$this->model = $role;
	}

	public function addRole($fields) {

		$data = $fields->except('_token, permissions');

		$role = $this->model->create($data);
		
		if($role) {
			if($fields->permissions){
				foreach($fields->permissions as $permission) {
					$role->givePermissionTo($permission);
				}
			}
		}

		return ['status' => 'Role ' . $role->name . ' was added!'];			
	}

	public function updateRoles($fields, $role) {

		$data = $fields->except('_token, permissions');
		
		$role->fill($data)->update();
		$role->permissions()->detach();
		
		foreach($fields->permissions as $permission) {
			$role->givePermissionTo($permission);
		}

		return ['status' => 'Role ' . $role->name . ' was updated!'];
	}

	public function deleteRoles($role) {
		$role->permissions()->detach();

		$name = $role->name;

		if($role->delete()) {
			return ['status' => 'Role ' . $name . ' was deleted!'];
		}
	}
}

?>