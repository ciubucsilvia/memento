{!! Form::model($menu, ['route' => ['menus.update', $menu->id], 'method' => 'PUT']) !!}
	
	@include(config('settings.theme') . '.admin.menus.form')

{!! Form::close() !!}