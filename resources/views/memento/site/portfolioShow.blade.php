@if($portfolio)
    <div class="clear"></div>
    <div class="posts">
        <div class="portfolio type-portfolio status-publish hentry hentry-post group portfolio-post internal-post">
            <div class="post_header portfolio_header group">
            	@if($portfolio->image->path)
                	<img width="700" height="260" src="{{ asset(env('THEME')) }}/images/portfolios/{{ $portfolio->image->path }}" class="internal wp-post-image" alt="work" title="work" />                                
                @endif
                <h2>{{ $portfolio->title }}</h2>
            </div>
            <div class="post_content group  no-skills ">
                <p>{!! $portfolio->body !!}</p>
            </div>
        </div>
    </div>
@endif