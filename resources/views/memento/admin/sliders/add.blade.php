{!! Form::open(['route' => 'sliders.store', 'files' => true]) !!}
	
	@include(config('settings.theme') . '.admin.sliders.form')

{!! Form::close() !!}