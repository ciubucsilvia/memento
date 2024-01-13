{!! Form::model($portfolio, ['route' => ['portfolios.update', $portfolio->id], 'method' => 'PUT', 'files' => true]) !!}
	
	@include(config('settings.theme') . '.admin.portfolios.form')

{!! Form::close() !!}