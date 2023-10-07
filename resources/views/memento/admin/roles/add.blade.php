{!! Form::open(['route' => 'roles.store']) !!}
	
	@include(config('settings.theme') . '.admin.roles.form')

{!! Form::close() !!}