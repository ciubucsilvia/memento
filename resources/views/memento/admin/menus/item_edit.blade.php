{!! Form::model($itemMenu, ['route' => ['menus-item.update', $itemMenu->id], 'method' => 'PUT']) !!}
	
	@include(config('settings.theme') . '.admin.menus.item_form')

{!! Form::close() !!}