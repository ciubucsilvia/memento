@if($portfolios)
    <div id="portfolio-bigimage">
        @foreach($portfolios as $portfolio)
	        <div class="portfolio type-portfolio status-publish hentry work group">
	            <div class="work-thumbnail">
	            	@if(isset($portfolio->image->max))
	            		<a class="thumb img" href="{{ asset(env('THEME')) }}/images/portfolios/{{ $portfolio->image->max }}" rel="prettyPhoto[movies]"><img width="617" height="260" src="{{ asset(env('THEME')) }}/images/portfolios/{{ $portfolio->image->max }}" class="attachment-thumb_portfolio_big wp-post-image" alt="{{ $portfolio->title }}" title="{{ $portfolio->title }}" /></a>
	            	@endif
	            </div>
	            <div class="work-description">
	                <h2>{{ $portfolio->title }}</h2>
	                <p>{!! Str::limit($portfolio->body, Config::get('settings.site')['portfolio_description_in_category_page']) !!}</p>
	                <a class="read-more btn btn-son-1" href="{{ route('portfolioShow', ['alias' => $portfolio->alias]) }}" />
	                	<i class="icon-search"></i> {{ Lang::get('site.portfolio')['view_project'] }}
	                </a>                        
	            </div>
	            <div class="clear"></div>
	        </div>
        @endforeach
    </div>
    
    @include(env('THEME') . '.site.parts.paginate')
@endif