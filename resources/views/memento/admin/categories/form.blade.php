  <div class="box-body">
  
    <div class="form-group">
      {!! Form::label('title', $fields['title']) !!}
        {!! Form::text('title', null, ['class'=>"form-control"]) !!}
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          {!! Form::label('alias', $fields['alias']) !!}
            {!! Form::text('alias', null, ['class'=>"form-control"]) !!}
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          {!! Form::label('type', $fields['type']) !!}
          {!! Form::select('type', $types, isset($category) ? $category->type : null, ['class'=>"form-control"]) !!}
        </div>
      </div>
    </div>       
     
  </div><!-- /.box-body -->

  <div class="box-footer">
    {!! Form::submit($buttons['submit'], ['class' => "btn btn-primary"]) !!}
  </div>