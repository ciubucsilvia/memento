@include(env('THEME') . '.site.parts.alerts')    

<div id="respond">
    <h3 id="reply-title">Leave a <span>Reply</span> <small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Cancel reply</a></small></h3>
    <form action="{{ route('commentsStore') }}" method="post" id="commentform">
        @if(!Auth::check())
            <p class="comment-form-author"><label for="author">{{ $field_comment['name'] }}</label> <input id="author" name="name" type="text" value="" size="30" aria-required="true" /></p>
            <p class="comment-form-email"><label for="email">{{ $field_comment['email'] }}</label> <input id="email" name="email" type="text" value="" size="30" aria-required="true" /></p>
            <p class="comment-form-url"><label for="url">{{ $field_comment['website'] }}</label><input id="url" name="site" type="text" value="" size="30" /></p>
        @endif
        <p class="comment-form-comment"><label for="comment">{{ $field_comment['your_comment'] }}</label><textarea id="comment" name="body" cols="45" rows="8"></textarea></p>
        <div class="clear"></div>
        <p class="form-submit">
            <input type="submit" id="submit" value="{{ $field_comment['submit'] }}" />
            <input type="hidden" name="comment_post_ID" value="{{ $article->id }}" id="comment_post_ID" />
            <input type="hidden" name="comment_parent" id="comment_parent" value="0" />
        </p>
        {{ csrf_field() }}
    </form>
</div>