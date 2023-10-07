
@if(count($errors) > 0)
    <div class="callout callout-danger">
        @foreach($errors->all() as $error)
            <p>{!! $error !!}</p>
        @endforeach
    </div>
@endif

@if(session('status'))
    <div class="callout callout-info">
        <p>{!! session('status') !!}</p>
    </div>
@endif

@if(session('error'))
    <div class="callout callout-danger">
        </p>{!! session('error') !!}</p>
    </div>
@endif