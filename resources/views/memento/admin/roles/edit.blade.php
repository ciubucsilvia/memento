{!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'PUT']) !!}
	
	@include(config('settings.theme') . '.admin.roles.form')

{!! Form::close() !!}