{!! Form::open(['route' => 'categories.store']) !!}
	
	@include(config('settings.theme') . '.admin.categories.form')

{!! Form::close() !!}