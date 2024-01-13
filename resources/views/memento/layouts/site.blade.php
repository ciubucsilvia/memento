<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" dir="ltr" lang="en-US">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html dir="ltr" lang="en-US">
    <!--<![endif]-->
    <head>
        
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        
        <meta name="description" content="@yield('meta_desc')">
        <meta name="keywords" content="@yield('keywords')">
        
        <title>@yield('title')</title>
        
        <!-- [favicon] begin -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset(config('settings.theme')) }}/images/favicon.ico" />
        <link rel="icon" type="image/x-icon" href="{{ asset(config('settings.theme')) }}/images/favicon.ico" />
        <!-- [favicon] end --> 
        
        <!-- CSS Main -->
        <link rel="stylesheet" type="text/css" media="all" href="{{ asset(config('settings.theme')) }}/css/reset.css" />
        <link rel="stylesheet" type="text/css" media="all" href="{{ asset(config('settings.theme')) }}/style.css" />
        <link rel="stylesheet" type="text/css" media="screen and (max-width: 960px)" href="{{ asset(config('settings.theme')) }}/css/lessthen960.css" />
        <link rel="stylesheet" type="text/css" media="screen and (max-width: 600px)" href="{{ asset(config('settings.theme')) }}/css/lessthen600.css" />
        <link rel="stylesheet" type="text/css" media="screen and (max-width: 480px)" href="{{ asset(config('settings.theme')) }}/css/lessthen480.css" />
        <link rel="stylesheet" type="text/css" media="all" href="{{ asset(config('settings.theme')) }}/css/memento.css"  />
        
        <!-- CSS Plugin -->
        <link rel="stylesheet" href="{{ asset(config('settings.theme')) }}/css/prettyPhoto.css" type="text/css" media="all" />
        <link rel="stylesheet" href="{{ asset(config('settings.theme')) }}/css/tipsy.css" type="text/css" media="all" />
        <link rel='stylesheet' href="{{ asset(config('settings.theme')) }}/css/buttons.min.css" type='text/css' media='all' />
        <link rel='stylesheet' href="{{ asset(config('settings.theme')) }}/css/buttons.css" type='text/css' media='all' />
        <link rel='stylesheet' href="{{ asset(config('settings.theme')) }}/css/labels.min.css" type='text/css' media='all' />
        <link rel='stylesheet' href="{{ asset(config('settings.theme')) }}/css/wells.min.css" type='text/css' media='all' />
        
        @if(Route::currentRouteName() == 'index')
            <!-- CSS Slider -->
            <link rel='stylesheet' type='text/css' media='all' href="{{ asset(config('settings.theme')) }}/css/slider-elegant.css" />
        @endif
        
        @if(Route::currentRouteName() == 'index' || Route::currentRouteName() == 'contactIndex')
            <link rel="stylesheet" type="text/css" media="all" href="{{ asset(config('settings.theme')) }}/css/homes/home.css" />
        @else
            <link rel="stylesheet" type="text/css" media="all" href="{{ asset(config('settings.theme')) }}/css/homes/default.css" />
        @endif

        @if(Route::currentRouteName() == 'galleryIndex')
            <!-- gallery -->
            <link rel='stylesheet' href="{{ asset(config('settings.theme')) }}/css/gallery.css" type='text/css' media='all' />
            <link rel='stylesheet' href="{{ asset(config('settings.theme')) }}/css/elastislide.css" type='text/css' media='all' />
        @endif
        
        <!-- FONTS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans&amp;subset=latin%2Ccyrillic%2Cgreek&amp;ver=3.4.1" type="text/css" media="all" />
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Shadows+Into+Light&amp;subset=latin%2Ccyrillic%2Cgreek&amp;ver=3.4.1" type="text/css" media="all" />
        <link rel='stylesheet' href="{{ asset(config('settings.theme')) }}/css/font-awesome.css" type='text/css' media='all' />
        <link rel='stylesheet' href="{{ asset(config('settings.theme')) }}/fonts/socialico/stylesheet.css" type='text/css' media='all' />
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed%3A300%7CPlayfair+Display%3A400italic&#038;ver=3.4.1' type='text/css' media='all' />
        
        <!-- JavaScripts -->
        <script type="text/javascript">
            var yiw_prettyphoto_style = 'pp_default';
        </script>
        <script type="text/javascript" src="{{ asset(config('settings.theme')) }}/js/jquery.js"></script>
        <script type="text/javascript" src="{{ asset(config('settings.theme')) }}/js/comment-reply.js"></script>
        <script type="text/javascript" src="{{ asset(config('settings.theme')) }}/js/jquery.cycle.min.js"></script>
        <script type="text/javascript" src="{{ asset(config('settings.theme')) }}/js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="{{ asset(config('settings.theme')) }}/js/jquery.prettyPhoto.js"></script>
        <script type="text/javascript" src="{{ asset(config('settings.theme')) }}/js/jquery.tipsy.js"></script>
        <script type="text/javascript" src="{{ asset(config('settings.theme')) }}/js/jquery.tweetable.js"></script>
        <script type="text/javascript" src="{{ asset(config('settings.theme')) }}/js/jquery.nivo.slider.pack.js"></script>
        <script type="text/javascript" src="{{ asset(config('settings.theme')) }}/js/jquery.flexslider.min.js"></script>
        <script type="text/javascript" src="{{ asset(config('settings.theme')) }}/js/jquery.aw-showcase.js"></script>
        <script type="text/javascript" src="{{ asset(config('settings.theme')) }}/js/superfish.js"></script>
        <script type='text/javascript' src="{{ asset(config('settings.theme')) }}/js/jquery.eislideshow.js"></script>
        <script type='text/javascript' src="{{ asset(config('settings.theme')) }}/js/swfobject.js"></script>
        <script type='text/javascript' src="{{ asset(config('settings.theme')) }}/js/jquery.cookie.js"></script>
        <script type='text/javascript' src="{{ asset(config('settings.theme')) }}/js/buttons.min.js"></script>
        <script type='text/javascript' src="{{ asset(config('settings.theme')) }}/js/layerslider.kreaturamedia.jquery-min.js"></script>
        <script type='text/javascript' src="{{ asset(config('settings.theme')) }}/js/jquery.quicksand.js"></script>
        
    </head>
    <body class="no_js responsive boxed-layout chrome ">
        
        <!-- START WRAPPER -->
        <div class="wrapper group">
            <!-- START HEADER -->
            <div id="header" class="group">
                <div class="group inner">
                    
                    <!-- START LOGO -->
                    @yield('logo')
                    <!-- END LOGO -->  
                    
                    <!-- START NAV -->
                    @yield('navigation')
                    <!-- END NAV -->     
                </div>
            </div>
            <!-- END HEADER -->

            <!-- SLIDER -->
            <!-- START SLIDER -->
                @yield('slider')
            <!-- END SLIDER -->
            <!-- /SLIDER -->

             <!-- MAP -->
                @yield('map')
            <!-- /MAP -->

            <!-- /START PAGE META --> 
                @yield('pageTitle')
            <!-- /END PAGE META --> 
            
            <div id="primary" class="layout-sidebar-{{ $bar }} home-section">
                <div class="inner group">
                    <!-- START CONTENT -->
                    <div id="content" class="group">
                        @yield('content')
                    </div>
                    <!-- END CONTENT -->  
                    <!-- START LATEST NEWS -->
                    @yield('sideBar')
                    <!-- END LATEST NEWS -->   
                </div>
            </div>
            @yield('projectsIndex')

            <div class="clear"></div>
        </div>     
        <!-- END WRAPPER -->
        
        @yield('footer')
    
        <script type="text/javascript" src="{{ asset(config('settings.theme')) }}/js/jquery.custom.js"></script>
        <script type="text/javascript" src="{{ asset(config('settings.theme')) }}/js/contact.js"></script>
        
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36516261-21']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>       
    </body>
</html>