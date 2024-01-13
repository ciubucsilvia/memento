  <div class="box-body">
        <div class="form-group">
          {!! Form::label('title', $fields['title']) !!}
          {!! Form::text('title', null, ['class'=>"form-control"]) !!}
        </div>
  </div><!-- /.box-body -->

  <div class="box-footer">
    {!! Form::submit($buttons['submit'], ['class' => "btn btn-primary"]) !!}
  </div>
