@if($articles)
   	@foreach($articles as $article)
    	<div class="post type-post status-publish format-standard hentry hentry-post group blog-big">
	        
	        @include(env('THEME') . '.site.articleShowContentParts')

	        <div class="the-content">
	            <p>{!! Str::limit($article->body, Config::get('settings.site')['article_description_in_blog_page']) !!}</p>
	            <p> <a href="{{ route('articleShow', ['alias' => $article->alias]) }}" class="more-link">{{ Lang::get('site.article')['read_more'] }}</a></p>
	        </div>
	    </div>
    @endforeach
    @include(env('THEME') . '.site.parts.paginate')
@endif