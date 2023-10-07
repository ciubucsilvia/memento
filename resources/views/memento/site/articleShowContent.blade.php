@if($article)
    <div class="clear"></div>
    
    <div class="post type-post status-publish format-standard hentry hentry-post group blog-big">

    	@include(env('THEME') . '.site.articleShowContentParts')

        <div class="clearer"></div>
        <div class="the-content-single">
            <p>{!! $article->body !!}</p>
        </div>
    </div>
    
    <div id="comments">
    	@include(env('THEME') . '.site.comments')
    </div>
@endif