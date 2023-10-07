    <div class="widget-first widget-last widget recent-posts">
        <h3>{{ Lang::get('site.index')['lastArticles'] }}</h3>
        <div class="recent-post group">
            @if($articles)
                @foreach($articles as $article)
                    <div class="hentry-post group">
                        @if($article->image->min)
                            <div class="thumb-img"><img width="55" height="55" src="{{ asset(env('THEME')) }}/images/articles/{{ $article->image->min }}" class="attachment-thumb_recentposts wp-post-image" alt="{{ $article->title }}" title="{{ $article->title }}" /></div>
                        @endif
                        <a href="{{ route('articleShow', ['alias' => $article->alias]) }}" title="{{ $article->title }}" class="title">{{ $article->title }}</a>
                        @if($article->created_at)
                            <p class="post-date">{{ $article->created_at->format('M j, Y') }}</p>
                        @endif
                    </div>
                @endforeach
            @endif
        </div>
    </div>