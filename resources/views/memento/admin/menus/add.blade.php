{!! Form::open(['route' => 'menus.store']) !!}
	
	@include(config('settings.theme') . '.admin.menus.form')

{!! Form::close() !!}