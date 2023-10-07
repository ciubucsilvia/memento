@if($content)
	<div class="page type-page status-publish hentry group">
	    <h1>{{ $content->title }}</h1>
	    <p>{!! $content->body !!}</p>
	</div>
@endif