<div class="widget-first widget popular-posts">
    <h3>{!! Lang::get('site.article')['from_the_blog'] !!}</h3>
    @if($articles)
	    <div class="recent-post group">
	        @foreach($articles as $article)
		        <div class="hentry-post group">
		        	@if($article->image->min)
		            	<div class="thumb-img"><img width="55" height="55" src="{{ asset(env('THEME')) }}/images/articles/{{ $article->image->min }}" class="attachment-thumb_recentposts wp-post-image" alt="{{ $article->title }}" title="{{ $article->title }}" /></div>
		            @endif
		            <a href="{{ route('articleShow', ['alias' => $article->alias]) }}" title="{{ $article->title }}" class="title">{{ $article->title }}</a>
		            @if($article->created_at)
		            	<p class="post-date">{{ $article->created_at->format('F j, Y') }}</p>
		            @endif
		        </div>
	        @endforeach
	    </div>
	@endif
</div>

@include(env('THEME') . '.site.widgets.customer_support')

@include(env('THEME') . '.site.widgets.icon_widget')