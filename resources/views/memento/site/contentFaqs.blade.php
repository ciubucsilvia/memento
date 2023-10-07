@if($faqs)	
	<div class="page type-page status-publish hentry group">
		@foreach($faqs as $k => $faq)
	        <div class="toggle">
	            <p class="tab-index {{ $k == 0 ? 'tab-opened' : 'tab-closed' }}"><a href="#" title="Close">{{ $faq->question }}</a></p>
	            <div class="content-tab {{ $k == 0 ? 'opened' : 'closed' }}">
	                {!! $faq->answer !!}
	            </div>
	        </div>
        @endforeach

        <div class="clear space"></div>
        <div class="call-to-action">
            <div class="incipit">
                <h2>Not found the answer?</h2>
                <p>feel free to contact our customer service for free support</p>
            </div>
            <div class="separate-phone"></div>
            <div class="number-phone">800.034</div>
            <div class="clear"></div>
            <div class="decoration-image"></div>
        </div>
    </div>
@endif