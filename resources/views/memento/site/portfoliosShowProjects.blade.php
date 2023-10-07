    <div id="more_projects-2" class="widget-1 widget-first widget-last widget more_projects">
        <h2>{{ Lang::get('site.portfolio')['featured_projects'] }}</h2>
        @if($projects)
        <div class="more-projects-widget">
            <div class="top"><a class="prev" href="#">Prev</a></div>
            <div class="sliderWrap">
                <ul>
                	@foreach($projects as $project)
	                    <li class="work-item group">
	                    	@if($project->image->min)
	                        	<a class="work-thumb" href="{{ route('portfolioShow', ['alias' => $project->alias]) }}"><img width="86" height="86" src="{{ asset(env('THEME')) }}/images/portfolios/{{ $project->image->min }}" class="attachment-thumb_more_projects wp-post-image" alt="{{ $project->title }}" title="{{ $project->title }}" /></a>
	                        @endif
	                        <a class="meta work-title" href="{{ route('portfolioShow', ['alias' => $project->alias]) }}">{{ $project->title }}</a>
	                        <p class="meta categories"><a href="{{ route('portfoliosCategory', ['alias' => $project->category->alias]) }}">{{ $project->category->title }}</a></p>
	                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="controls"><a class="next" href="#">Next</a></div>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function($){
                var slider_wrap = $('.more-projects-widget');
                var height_item = $('li', slider_wrap).outerHeight();
                var height_ul   = $('ul', slider_wrap).height();
                var height_wrap = $('.sliderWrap', slider_wrap).height();
                var n_items     = $('li', slider_wrap).length;
                var visible     = 4;
            
                $('.controls, .top', slider_wrap).show();
            
                // adjust height, according to visible item
                $('.sliderWrap', slider_wrap).css('height', height_item * visible - 6);
            
                function check_position() {    
                    var margin_top_ul = $('ul', slider_wrap).css('margin-top');
                    var max_offset  = ( n_items - visible ) * height_item * -1;
            
                    if ( margin_top_ul == '0px' ) {
                        $('.prev', slider_wrap).addClass('disabled');
                    }
            
                    if ( margin_top_ul == max_offset+'px' ) {
                        $('.next', slider_wrap).addClass('disabled');
                    }
                }
            
                check_position();
            
                $('.next:not(.disabled)', slider_wrap).live('click',function(){
                    $('ul', slider_wrap).animate( {marginTop:'-='+height_item}, 200, function(){ check_position(); } );
                    $('.prev', slider_wrap).removeClass('disabled');
                    return false;
                });
            
                $('.prev:not(.disabled)', slider_wrap).live('click',function(){
                    $('ul', slider_wrap).animate( {marginTop:'+='+height_item}, 200, function(){ check_position(); } );
                    $('.next', slider_wrap).removeClass('disabled');
                    return false;
                });
            
                $('.disabled', slider_wrap).live('click', function(){
                    return false;
                });
            });
        </script>
        @endif
    </div>