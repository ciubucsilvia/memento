{!! Form::open(['route' => 'testimonials.store', 'files' => true]) !!}
	
	@include(config('settings.theme') . '.admin.testimonials.form')

{!! Form::close() !!}