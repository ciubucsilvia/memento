@extends(env('theme') . '.layouts.admin')

@section('title')
	{{ $title }}
@endsection

@section('navigation')
	{!! $navigation !!}
@endsection

@section('sidebar')
	{!! $sidebar !!}
@endsection

@section('alert')
	{!! $alert !!}
@endsection

@section('content')
	{!! $content !!}
@endsection

@section('footer')
	{!! $footer !!}
@endsection