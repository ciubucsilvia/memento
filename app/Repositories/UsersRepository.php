<?php

namespace App\Repositories;

use App\Models\User;

class UsersRepository extends Repository
{
	public function __construct(User $user) {

		$this->model = $user;
	}

	public function addUser($fields) {

		$user = $this->model->create([
			'name' => $fields->input('name'),
			'password' => bcrypt($fields->input('password')),
			'email' => $fields->input('email'),
		]);
		
		if($user) {
			$user->roles()->attach($fields->input('role'));
		}

		return ['status' => 'User  '. $user->name .' added!'];
	} 

	public function updateUser($fields, $user) {

		$data = $fields->except('_method', '_token', 'password');

		if(isset($fields->input['password'])) {
			$user->password = bcrypt($fields->input['password']);
		}

		$user->fill($data)->update();

		$user->roles()->sync($fields->input('role'));

		return ['status' => 'User ' . $user->name . ' updated!'];
	}

	public function deleteUsers($user) {
		$user->roles()->detach();

		$userName = $user->name;

		if($user->delete()) {
			return ['status' => 'User ' . $userName . ' deleted!'];
		}		
	}
}

?>