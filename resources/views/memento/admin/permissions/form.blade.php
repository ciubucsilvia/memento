  <div class="box-body">
    <div class="form-group">
    	{!! Form::label('name', $fields['name']) !!}
      	{!! Form::text('name', null, ['class'=>"form-control"]) !!}
    </div>
    {{-- <div class="form-group">
    	{!! Form::label('display_name', $fields['display_name']) !!}
      	{!! Form::text('display_name', null, ['class'=>"form-control"]) !!}
    </div>
    <div class="form-group">
    	{!! Form::label('description', $fields['description']) !!}
      	{!! Form::text('description', null, ['class'=>"form-control"]) !!}
    </div> --}}
  </div><!-- /.box-body -->

  <div class="box-footer">
    {!! Form::submit($buttons['submit'], ['class' => "btn btn-primary"]) !!}
  </div>