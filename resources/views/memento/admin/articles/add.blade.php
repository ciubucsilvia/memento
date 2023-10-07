{!! Form::open(['route' => 'articles.store', 'files' => true]) !!}
	
	@include(config('settings.theme') . '.admin.articles.form')

{!! Form::close() !!}