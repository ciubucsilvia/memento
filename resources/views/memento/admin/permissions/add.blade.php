{!! Form::open(['route' => 'permissions.store']) !!}
	
	@include(config('settings.theme') . '.admin.permissions.form')

{!! Form::close() !!}