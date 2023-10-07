		<div id="footer" class="sidebar-right">
            <div class="group inner footer_row_1 footer_cols_3">
                
                <div class="widget-first widget recent-posts">
                    <h3>{{ Lang::get('site.index')['from_our_blog'] }}</h3>
                    <div class="recent-post group">
                        @if($articles)
                            @foreach($articles as $article)

                                <div class="hentry-post group">
                                    @if($article->created_at)
                                        <p class="post-date"><span class="day">{{ $article->created_at->format('d') }}</span><span class="month">{{ $article->created_at->format('M') }}</span><span class="year">{{ $article->created_at->format('Y') }}</span></p>
                                    @endif
                                    <h3><a href="{{ route('articleShow', ['alias' => $article->alias]) }}" title="{{ $article->title }}" class="title">{{ $article->title }}</a></h3>
                                    <p class="meta">
                                        <span class="comments"><a href="{{ route('articleShow', ['alias' => $article->alias]) }}#respond" title="{{ Lang::get('site.index')['comment_on'] . $article->title }}">
                                            @if(count($article->comments) > 0)
                                                {{ count($article->comments) }} . ' ' . Lang::choice(('site.index')['comments'], count($article->comments))
                                            @else 
                                                {{ Lang::get('site.index')['comments_no'] }}
                                            @endif
                                        </a></span><br />
                                        <a href="{{ route('articleShow', ['alias' => $article->alias]) }}" class="read-more"></a>
                                    </p>
                                </div>

                            @endforeach
                        @endif                                           
                    </div>
                </div>
                
                <div class="widget widget_nav_menu">
                    <h3>{{ Lang::get('site.index')['custom_menu'] }}</h3>
                    @if($menuBottom)
                    <div class="menu-footer-menu-container">
                        <ul id="menu-footer-menu" class="menu">
                            @foreach($menuBottom->roots() as $k => $item)
                                @if($k == Config::get('settings.site')['footer_nr_pages'])
                                    @break;
                                @endif
                                 
                               <li class="columns2">
                                    <a href="{{ $item->url() }}">{{ $item->title }}</a>
                                </li> 
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                
                <div class="quick-contact-widget widget two-third last">
                    <div class="widget-last widget quick-contact">
                        <h3>{{ Lang::get('site.index')['quick_contact'] }}</h3>
                        
                        @include(env('THEME') . '.site.parts.form_contact_footer')

                    </div>
                </div>
                
            </div>
        </div>
        
        <!-- START FOOTER -->
        <div id="copyright" class="group">
            <div class="inner group">
                <div class="left">
                    <p>
                    	Copyright 2018
                    </p>
                </div>
                <div class="right">
                    @if($icons)
                        @foreach($icons as $icon)
                            <a href="{{ $icon->link }}" class="socials {{ $icon->class }}" style="font-size:30px;" title="{{ str_limit($icon->title) }}">{{ $icon->icon }}</a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>