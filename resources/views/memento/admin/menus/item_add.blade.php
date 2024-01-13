{!! Form::open(['route' => 'menus-item.store']) !!}
	
	@include(config('settings.theme') . '.admin.menus.item_form')

{!! Form::close() !!}