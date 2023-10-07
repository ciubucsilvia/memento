@if($posts->lastPage() > 1)
	<div class="general-pagination group">
		
		@if($posts->onFirstPage())
			<a>{{ Lang::get('pagination.previous_post') }}</a>
		@else
			<a href="{{ $posts->previousPageUrl() }}">{{ Lang::get('pagination.previous_post') }}</a>
		@endif
		
		@for($i = 1; $i <= $posts->lastPage(); $i++)
			@if($i == $posts->currentPage())
				<a class="selected disabled">{{ $i }}</a>
			@else 
				<a href="{{ $posts->url($i) }}">{{ $i }}</a>
			@endif
		@endfor

		@if(!$posts->hasMorePages())
			<a>{{ Lang::get('pagination.next_post') }}</a>
		@else
			<a href="{{ $posts->nextPageUrl() }}">{{ Lang::get('pagination.next_post') }}</a>
		@endif

	</div>
	<div class="clear"></div>
@endif