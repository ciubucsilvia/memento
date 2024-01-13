@if($testimonials)	
	<div class="page type-page status-publish hentry group">
        @foreach($testimonials as $k => $testimonial)
	        <div class="testimonial two-fourth {{ $k%2 == 1 ? 'last' : '' }}">
	            <div class="thumbnail">
	            	@if($img = json_decode($testimonial->image))
	                	<img width="94" height="94" src="{{ asset(env('THEME')) }}/images/testimonials/{{ $img->path }}" class="attachment-thumb_testimonial wp-post-image" alt="$testimonial->name" title="$testimonial->name" />
	                @endif            
	            </div>
	            <div class="testimonial-text">
	                {!! $testimonial->body !!}
	            </div>
	            <div class="testimonial-name">
	                <p class="name">{{ $testimonial->name }}</p>
	                @if($testimonial->site_path && $testimonial->site_title)
	                	<a class="website" href="{{ $testimonial->site_path }}">{{ $testimonial->site_title }} </a>
	                @endif            
	            </div>
	        </div>
        @endforeach        
    </div>
@endif