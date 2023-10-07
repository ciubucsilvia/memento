@if($sliders)
    <div id="slider" class="slider_elegant group inner">
        <ul class="group">
            @foreach($sliders as $slider)
                <li class="group">
                    <div class="slider-featured group">
                        @if(isset($slider->image->path))
                            <img src="{{ asset(config('settings.theme')) }}/images/sliders/{{ $slider->image->path }}" width="1000" height="338" alt="{{ $slider->title }}" />
                        @endif
                    </div>
                    <div class="slider-caption caption-right">
                        <h2>{{ $slider->title }}</h2>
                        {!! $slider->body !!}
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <script type="text/javascript">      
        var     yiw_slider_type = 'elegant',
                yiw_slider_elegant_easing = null,
                yiw_slider_elegant_fx = 'fade',
                yiw_slider_elegant_speed = 500,
                yiw_slider_elegant_timeout = 5000,
                yiw_slider_elegant_caption_speed = 500;  
    </script>
@endif