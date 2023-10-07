  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          {!! Form::label('title', $fields['title']) !!}
          {!! Form::text('title', null, ['class'=>"form-control"]) !!}
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          {!! Form::label('class', $fields['class']) !!}
          {!! Form::text('class', null, ['class'=>"form-control"]) !!}
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          {!! Form::label('icon', $fields['icon']) !!}
          {!! Form::text('icon', null, ['class'=>"form-control"]) !!}
        </div>
      </div>
    </div>
      
    <div class="form-group">
      {!! Form::label('link', $fields['link']) !!}
      {!! Form::text('link', null, ['class'=>"form-control"]) !!}
    </div>

  </div><!-- /.box-body -->

  <div class="box-footer">
    {!! Form::submit($buttons['submit'], ['class' => "btn btn-primary"]) !!}
  </div>