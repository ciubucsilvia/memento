@if($categories)
	@foreach($categories as $category)
		<h3><a href="{{ route('portfoliosCategory', ['alias' => $category->alias]) }}" title="{{ $category->title }}">{{ $category->title }}</a></h3>
        <div class="portfolio-slider">
            @if(count($category->portfolios) > 0)
            <ul>
            	@foreach($category->portfolios as $portfolio)
	                <li class="post">
	                	@if($portfolio->image)
	                		<a class="thumb img" href="{{ asset(env('THEME')) }}/images/portfolios/{{ json_decode($portfolio->image)->path_cat_max }}" rel="prettyPhoto[{{ $category->title }}]" title="{{ $portfolio->title }}"><img width="205" height="118" src="{{ asset(env('THEME')) }}/images/portfolios/{{ json_decode($portfolio->image)->path_cat_max }}" class="attachment-thumb_portfolio_slider wp-post-image" alt="{{ $portfolio->title }}" title="{{ $portfolio->title }}" /></a>
	                    @endif
	                </li>
	            @endforeach
            </ul>
            @endif
        </div>
        <div class="clear"></div>
    @endforeach
        <script src="{{ asset(env('THEME')) }}/js/jquery.jcarousel.min.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('.portfolio-slider').jcarousel({
                    scroll: 1
                });
            });
        </script>
@endif