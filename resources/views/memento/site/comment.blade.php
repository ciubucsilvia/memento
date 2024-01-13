@foreach($items as $item)
    <li class="comment byuser comment-author-marco even thread-even depth-1">
        
        <div id="comment-{{ $item->id }}" class="comment-container">
            <div class="comment-author vcard">
                
                <img alt="" src="https://www.gravatar.com/avatar/{{$item->getHash()}}?d=mm&s=75" class="avatar avatar-75 photo" height="75" width="75" />                
                <cite class="fn">{{ isset($item->user) ? $item->user->name : $item->name }}</cite>             
            </div>
            <div class="comment-meta commentmetadata">
                <div class="intro">
                    <div class="commentDate">
                        <a href="#comment-{{ $item->id }}">
                        {{ is_object($item->created_at) ? $item->created_at->format('F j, Y \a\t H:i') : '' }}</a>
                    </div>
                    <!-- <div class="commentNumber">#&nbsp;</div> -->
                </div>
                <div class="comment-body">
                    <p>{{ $item->body }}</p>
                </div>
                <div class="reply group">
                    <a class="comment-reply-link" href="#respond" onclick="return addComment.moveForm(&quot;comment-{{ $item->id }}&quot;, &quot;{{ $item->id }}&quot;, &quot;respond&quot;, &quot;{{ $item->article_id }}&quot;)">{{ Lang::get('site.article')['reply'] }}</a>                
                </div>
            </div>
        </div>
     
         @if(isset($com[$item->id]))
        <ul class="children">
            @include(env('THEME') . '.site.comment', ['items'=>$com[$item->id]])
        </ul>
        @endif
        
    </li>
@endforeach