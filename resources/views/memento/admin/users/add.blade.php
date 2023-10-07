{!! Form::open(['route' => 'users.store']) !!}
	
	@include(config('settings.theme') . '.admin.users.form')

{!! Form::close() !!}