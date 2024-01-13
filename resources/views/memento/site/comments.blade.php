    <h3 id="comments-title">
        <span>{{ count($article->comments) }}</span> {{ Lang::choice('site.article.comments', count($article->comments)) }}			
    </h3>

    @if(count($article->comments) > 0)
        <ol class="commentlist group">
            @foreach($article->getComments() as $k => $comments)
                {{-- @if($k !== 0)
                    @break
                @endif --}}

                @include(env('THEME') . '.site.comment', ['items'=>$comments])

            @endforeach
        </ol>        
    @endif
    
    <!-- START TRACKBACK & PINGBACK -->
    <h2 id="trackbacks">Trackback e pingback</h2>
    <ol class="trackbacklist">
    </ol>
    <p><em>No trackback or pingback available for this article</em></p>
    <!-- END TRACKBACK & PINGBACK -->
    
    @include(env('THEME') . '.site.add_comment')