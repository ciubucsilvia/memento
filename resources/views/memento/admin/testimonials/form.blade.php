  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          {!! Form::label('name', $fields['name']) !!}
          {!! Form::text('name', null, ['class'=>"form-control"]) !!}
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          {!! Form::label('site_title', $fields['site_title']) !!}
          {!! Form::text('site_title', null, ['class'=>"form-control"]) !!}
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group image_sticks">
          {!! Form::label('image', $fields['image']) !!}
          {!! Form::file('image', ['class'=>"form-control"]) !!}

          <div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          {!! Form::label('site_path', $fields['site_path']) !!}
          {!! Form::text('site_path', null, ['class'=>"form-control"]) !!}
        </div>
      </div>
    </div>

    @if(isset($testimonial->image))
      {!! Form::hidden('old_image', $testimonial->image->path) !!}
      <div class="form-group old_image">
          {!! Form::label('img', 'Image testimonial') !!} <br>
          {!! Html::image(asset(env('THEME')) . '/images/testimonials/' . $testimonial->image->path) !!}
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