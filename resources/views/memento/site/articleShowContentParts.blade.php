
<div class="meta group">
	@if($article->created_at)
    	<p class="date"><i class="icon-calendar"></i>{{ $article->created_at->format('F j, Y') }}</p>
    @endif
    <p class="author"><i class="icon-user"></i> <span>{{ Lang::get('site.article')['by_user'] }} <a href="author.html" title="{{ Lang::get('site.article')['posts_by'] . ' ' . $article->user->name }}" rel="author">{{ $article->user->name }}</a></span></p>
    @if($article->category->alias == 'blog' || $article->category->alias == 'portfolio')
        <p class="categories"><i class="icon-tags"></i> <span>{{ Lang::get('site.article')['in_category'] }} <a href="{{ route(Route::currentRouteName()) }}" title="{{ Lang::get('site.article')['view_all_posts_in'] . ' ' . $article->category->title }}" rel="category tag">{{ $article->category->title }}</a></span></p>
    @else
        <p class="categories"><i class="icon-tags"></i> <span>{{ Lang::get('site.article')['in_category'] }} <a href="{{ route('articlesCategory', ['alias' => $article->category->alias]) }}" title="{{ Lang::get('site.article')['view_all_posts_in'] . ' ' . $article->category->title }}" rel="category tag">{{ $article->category->title }}</a></span></p>
        {{-- <p class="categories"><i class="icon-tags"></i> <span>{{ Lang::get('site.article')['in_category'] }} {{ $article->category->title }}</span></p> --}}
    @endif
    <p class="comments"><i class="icon-comment"></i> <span><a href="{{ route('articleShow', ['alias' => $article->alias]) }}#comments" title="{{ Lang::get('site.article')['comment_on'] . ' ' . $article->title}}">{{ count($article->comments) . ' ' . Lang::choice('site.article.comments', count($article->comments)) }}</a></span></p>
</div>
<div class="thumbnail">
    <h1 class="post-title"><a href="{{ route('articleShow', ['alias' => $article->alias]) }}">{{ $article->title }}</a></h1>
    <div class="image-wrap">
    	@if($article->image->path)
        	<img width="720" height="298" src="{{ asset(env('THEME')) }}/images/articles/{{ $article->image->path }}" class="attachment-blog_big wp-post-image" alt="{{ $article->title }}" title="{{ $article->title }}" />
        @endif                            
    </div>
</div>