{!! Form::model($icon, ['route' => ['icons.update', $icon->id], 'method' => 'PUT', 'files' => true]) !!}
	
	@include(config('settings.theme') . '.admin.icons.form')

{!! Form::close() !!}