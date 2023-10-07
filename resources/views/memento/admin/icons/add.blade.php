{!! Form::open(['route' => 'icons.store', 'files' => true]) !!}
	
	@include(config('settings.theme') . '.admin.icons.form')

{!! Form::close() !!}