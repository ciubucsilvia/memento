{!! Form::model($permission, ['route' => ['permissions.update', $permission->id], 'method' => 'PUT']) !!}
	
	@include(config('settings.theme') . '.admin.permissions.form')

{!! Form::close() !!}