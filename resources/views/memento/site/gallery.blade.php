 @extends(config('settings.theme') . '.layouts.site')

@section('title')
	{{ $title }}
@endsection

@section('meta_desc')
	{{ $meta_desc }}
@endsection

@section('keywords')
	{{ $keywords }}
@endsection

@section('logo')
	{!! $logo !!}
@endsection

@section('navigation')
	{!! $navigation !!}
@endsection

@section('pageTitle')
	{!! $pageTitle !!}
@endsection

@section('content')
	{!! $content !!}
@endsection

@section('sideBar')
	{!! $sideBar !!}
@endsection

@section('footer')
	{!! $footer !!}
@endsection