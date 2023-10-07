{!! Form::model($slider, ['route' => ['sliders.update', $slider->id], 'method' => 'PUT', 'files' => true]) !!}
	
	@include(config('settings.theme') . '.admin.sliders.form')

{!! Form::close() !!}