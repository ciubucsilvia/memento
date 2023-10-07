  <div class="box-body">
    <div class="form-group">
      {!! Form::label('title', $fields['title']) !!}
      {!! Form::text('title', null, ['class'=>"form-control"]) !!}
    </div>
    
    <div class="form-group image_sticks">
      {!! Form::label('image', $fields['image']) !!}
      {!! Form::file('image', ['class'=>"form-control"]) !!}

      <div>
      </div>
    </div>

    @if(isset($slider->image))
      {!! Form::hidden('old_image', $slider->image->min) !!}
      <div class="form-group old_image">
          {!! Form::label('img', 'Image slider') !!} <br>
          {!! Html::image(asset(env('THEME')) . '/images/sliders/' . $slider->image->min) !!}
      </div>
    @endif
    
    <div class="form-group">
      {!! Form::label('body', $fields['body']) !!}
        {!! Form::textarea('body', null, ['class'=>"form-control", 'id' => 'editor']) !!}
    </div>

  </div><!-- /.box-body -->

  <div class="box-footer">
    {!! Form::submit($buttons['submit'], ['class' => "btn btn-primary"]) !!}
  </div>