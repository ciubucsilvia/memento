<?php

namespace App\Repositories;

use App\Role;
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
				foreach($fields->permissions as $key => $permission) {
					$role->attachPermission($key);
				}
			}
		}

		return ['status' => 'Role ' . $role->display_name . ' was added!'];			
	}

	public function updateRoles($fields, $role) {

		$data = $fields->except('_token, permissions');
		
		$role->fill($data)->update();

		DB::table('permission_role')->where('role_id', $role->id)->delete();

		foreach($fields->permissions as $key => $permission) {
			$role->attachPermission($key);
		}

		return ['status' => 'Role ' . $role->display_name . ' was updated!'];
	}

	public function deleteRoles($role) {
		$role->perms()->detach();

		$name = $role->display_name;

		if($role->delete()) {
			return ['status' => 'Role ' . $name . ' was deleted!'];
		}
	}
}

?>