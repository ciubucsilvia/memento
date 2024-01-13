{!! Form::model($page, ['route' => ['pages.update', $page->id], 'method' => 'PUT']) !!}
	
	@include(config('settings.theme') . '.admin.pages.form')

{!! Form::close() !!}