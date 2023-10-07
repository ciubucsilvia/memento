{!! Form::model($gallery, ['route' => ['gallery.update', $gallery->id], 'method' => 'PUT', 'files' => true]) !!}
	
	@include(config('settings.theme') . '.admin.galleries.form')

{!! Form::close() !!}