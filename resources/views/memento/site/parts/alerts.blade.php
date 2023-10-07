
@if(count($errors) > 0)
    <div class="box error-box">
        @foreach($errors->all() as $error)
            <p>{!! $error !!}</p>
        @endforeach
    </div>
@endif

@if(session('status'))
    <div class="box info-box">
        <p>{!! session('status') !!}</p>
    </div>
@endif

@if(session('error'))
    <div class="box error-box">
        </p>{!! session('error') !!}</p>
    </div>
@endif