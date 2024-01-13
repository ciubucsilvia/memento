@if($gallery)
    <div id="rg-gallery" class="rg-gallery">
        <div class="rg-thumbs">
            <!-- Elastislide Carousel Thumbnail Viewer -->
            <div class="es-carousel-wrapper">
                <div class="es-nav">
                    <span class="es-nav-prev">Previous</span>
                    <span class="es-nav-next">Next</span>
                </div>
                <div class="es-carousel">
                    <ul>
                    	@foreach($gallery as $item)
                    		@if($item->image->min)
		                        <li>
		                            <a href="#">
		                            <img src="{{ asset(env('THEME')) }}/images/gallery/{{ $item->image->min }}" data-large="{{ asset(env('THEME')) }}/images/gallery/{{ $item->image->path }}" alt="{{ $item->title }}" data-description="{{ $item->title }}" />
		                            </a>
		                        </li>
		                    @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script type='text/javascript' src='{{ asset(env("THEME")) }}/js/jquery.tmpl.min.js'></script>
    <script type='text/javascript' src='{{ asset(env("THEME")) }}/js/jquery.elastislide.js'></script>
	<script type='text/javascript' src='{{ asset(env("THEME")) }}/js/gallery.js'></script>
	<script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">
	    <div class="rg-image-wrapper">
	        {{--if itemsCount > 1--}}
	            <div class="rg-image-nav">
	                <a href="#" class="rg-image-nav-prev">Previous Image</a>
	                <a href="#" class="rg-image-nav-next">Next Image</a>
	            </div>
	        {{--/if--}}
	        <div class="rg-image"></div>
	        <div class="rg-loading"></div>
	    </div>      
	    <div class="rg-caption-wrapper">
	        <div class="rg-caption" style="display:none;">
	            <p></p>
	        </div>
	    </div>
	</script>
@endif