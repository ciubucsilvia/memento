{!! Form::open(['route' => 'gallery.store', 'files' => true]) !!}
	
	@include(config('settings.theme') . '.admin.galleries.form')

{!! Form::close() !!}