{!! Form::open(['route' => 'pages.store']) !!}
	
	@include(config('settings.theme') . '.admin.pages.form')

{!! Form::close() !!}