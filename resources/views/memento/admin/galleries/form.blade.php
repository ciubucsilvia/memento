  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          {!! Form::label('title', $fields['title']) !!}
          {!! Form::text('title', null, ['class'=>"form-control"]) !!}
        </div>
      </div>

      <div class="col-md-6">
        <br>
        <div class="form-group">
          @if(isset($gallery) && $gallery->published)
            {!! Form::checkbox('published', $fields['published'], true) !!}
          @else 
            {!! Form::checkbox('published') !!}
          @endif
          {!! Form::label('published', $fields['published']) !!}
        </div>
      </div>
    </div>
    
    <div class="form-group image_sticks">
      {!! Form::label('image', $fields['image']) !!}
      {!! Form::file('image', ['class'=>"form-control"]) !!}
      <div>
      </div>
    </div>

    @if(isset($gallery->image))
      {!! Form::hidden('old_image', $gallery->image->min) !!}
      <div class="form-group old_image">
          {!! Form::label('img', 'Image gallery') !!} <br>
          {!! Html::image(asset(env('THEME')) . '/images/gallery/' . $gallery->image->min) !!}
      </div>
    @endif

  </div><!-- /.box-body -->

  <div class="box-footer">
    {!! Form::submit($buttons['submit'], ['class' => "btn btn-primary"]) !!}
  </div>