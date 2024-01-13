{!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
	
	@include(config('settings.theme') . '.admin.users.form')

{!! Form::close() !!}