		        <div id="sidebar" class="group one-fourth last">
		            <div id="more_projects-2" class="widget-1 widget-first widget-last widget more_projects">
		                <h2>Featured Projects</h2>
		                <div class="more-projects-widget">
		                    <div class="top"><a class="prev" href="#">Prev</a></div>
		                    <div class="sliderWrap">
		                        <ul>
		                            <li class="work-item group">
		                                <a class="work-thumb" href="project.html"><img width="86" height="86" src="images/portfolio/work-86x86.jpg" class="attachment-thumb_more_projects wp-post-image" alt="work" title="work" /></a>
		                                <a class="meta work-title" href="project.html">Maya Shop</a>
		                                <p class="meta categories"><a href="#">Web Design</a></p>
		                            </li>
		                            <li class="work-item group">
		                                <a class="work-thumb" href="project.html"><img width="86" height="86" src="images/portfolio/work2-86x86.jpg" class="attachment-thumb_more_projects wp-post-image" alt="work2" title="work2" /></a>
		                                <a class="meta work-title" href="project.html">Sheeva WP Theme</a>
		                                <p class="meta categories"></p>
		                            </li>
		                            <li class="work-item group">
		                                <a class="work-thumb" href="project.html"><img width="86" height="86" src="images/portfolio/x5-700x295-86x86.jpg" class="attachment-thumb_more_projects wp-post-image" alt="x5-700x295" title="x5-700x295" /></a>
		                                <a class="meta work-title" href="project.html">Xmas Icons</a>
		                                <p class="meta categories"><a href="#">Web Design</a></p>
		                            </li>
		                            <li class="work-item group">
		                                <a class="work-thumb" href="project.html"><img width="86" height="86" src="images/portfolio/0014-86x86.jpg" class="attachment-thumb_more_projects wp-post-image" alt="0014" title="0014" /></a>
		                                <a class="meta work-title" href="project.html">Creative Brand</a>
		                                <p class="meta categories"><a href="#">Brand Identity</a>, <a href="#">Web Design</a></p>
		                            </li>
		                            <li class="work-item group">
		                                <a class="work-thumb" href="project.html"><img width="86" height="86" src="images/portfolio/004-700x2951-86x86.jpg" class="attachment-thumb_more_projects wp-post-image" alt="004-700x2951" title="004-700x2951" /></a>
		                                <a class="meta work-title" href="project.html">Black Identity</a>
		                                <p class="meta categories"><a href="#">Brand Identity</a>, <a href="#">Web Design</a></p>
		                            </li>
		                            <li class="work-item group">
		                                <a class="work-thumb" href="project.html"><img width="86" height="86" src="images/portfolio/xa-700x295-86x86.jpg" class="attachment-thumb_more_projects wp-post-image" alt="xa-700x295" title="xa-700x295" /></a>
		                                <a class="meta work-title" href="project.html">Meménto WP Theme</a>
		                                <p class="meta categories"><a href="#">Brand Identity</a>, <a href="#">Web Design</a></p>
		                            </li>
		                            <li class="work-item group">
		                                <a class="work-thumb" href="project.html"><img width="86" height="86" src="images/portfolio/21-86x86.jpg" class="attachment-thumb_more_projects wp-post-image" alt="2" title="2" /></a>
		                                <a class="meta work-title" href="project.html">Digital Video</a>
		                                <p class="meta categories"><a href="#">Brand Identity</a></p>
		                            </li>
		                            <li class="work-item group">
		                                <a class="work-thumb" href="project.html"><img width="86" height="86" src="images/portfolio/x-700x295-86x86.jpg" class="attachment-thumb_more_projects wp-post-image" alt="x-700x295" title="x-700x295" /></a>
		                                <a class="meta work-title" href="project.html">Diverso WordPress theme</a>
		                                <p class="meta categories"><a href="#">Brand Identity</a>, <a href="#">Web Design</a></p>
		                            </li>
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
		            </div>
		        </div>