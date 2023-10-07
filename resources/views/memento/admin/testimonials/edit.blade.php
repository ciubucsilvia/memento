{!! Form::model($testimonial, ['route' => ['testimonials.update', $testimonial->id], 'method' => 'PUT', 'files' => true]) !!}
	
	@include(config('settings.theme') . '.admin.testimonials.form')

{!! Form::close() !!}