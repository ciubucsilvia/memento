  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          {!! Form::label('title', $fields['title']) !!}
            {!! Form::text('title', null, ['class'=>"form-control"]) !!}
        </div> 

        <div class="form-group">
          {!! Form::label('alias', $fields['alias']) !!}
            {!! Form::text('alias', null, ['class'=>"form-control"]) !!}
        </div>

        <div class="form-group">
          @if(isset($page) && $page->published)
            {!! Form::checkbox('published', $fields['published'], true) !!}
          @else 
            {!! Form::checkbox('published') !!}
          @endif
          {!! Form::label('published', $fields['published']) !!}
        </div>
      </div>

      <div class="col-md-6">
        {{-- <div class="form-group">
          {!! Form::label('keywords', $fields['keywords']) !!}
            {!! Form::text('keywords', null, ['class'=>"form-control"]) !!}
        </div> --}}

        <div class="form-group">
          {!! Form::label('meta_desc', $fields['meta_desc']) !!}
            {!! Form::text('meta_desc', null, ['class'=>"form-control"]) !!}
        </div>
      </div>
    </div>

    <div class="row">
      <div>
        <div class="form-group">
          {!! Form::label('body', $fields['body']) !!}
            {!! Form::textarea('body', null, ['class'=>"form-control", 'id' => 'editor']) !!}
        </div>
      </div>
    </div>
     
  </div><!-- /.box-body -->

  <div class="box-footer">
    {!! Form::submit($buttons['submit'], ['class' => "btn btn-primary"]) !!}
  </div>