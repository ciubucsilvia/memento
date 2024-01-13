{!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PUT']) !!}
	
	@include(config('settings.theme') . '.admin.categories.form')

{!! Form::close() !!}