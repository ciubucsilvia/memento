<li class="comment byuser comment-author-marco even thread-even depth-1">
    
    <div id="comment-{{ $data['id'] }}" class="comment-container">
        <div class="comment-author vcard">
            <img alt="" src="https://www.gravatar.com/avatar/{{$data['hash']}}?d=mm&s=75" class="avatar avatar-75 photo" height="75" width="75" />
            <cite class="fn">{{ $data['name'] }}</cite>
        </div>
        <div class="comment-meta commentmetadata">
            <div class="intro">
                <div class="commentDate">
                    <a href="#comment-{{ $data['id'] }}">
                    </a>
                </div>
                <div class="commentNumber">#&nbsp;</div>
            </div>
            <div class="comment-body">
                <p>{{ $data['body'] }}</p>
            </div>
            <div class="reply group">
                <                
            </div>
        </div>
    </div>

</li>