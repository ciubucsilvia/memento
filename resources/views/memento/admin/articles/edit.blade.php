{!! Form::model($article, ['route' => ['articles.update', $article->id], 'method' => 'PUT', 'files' => true]) !!}
	
	@include(config('settings.theme') . '.admin.articles.form')

{!! Form::close() !!}