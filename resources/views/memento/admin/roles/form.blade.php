  <div class="box-body">
    <div class="form-group">
    	{!! Form::label('name', $fields['name']) !!}
      	{!! Form::text('name', null, ['class'=>"form-control"]) !!}
    </div>
    <div class="form-group">
    	{!! Form::label('display_name', $fields['display_name']) !!}
      	{!! Form::text('display_name', null, ['class'=>"form-control"]) !!}
    </div>
    <div class="form-group">
    	{!! Form::label('description', $fields['description']) !!}
      	{!! Form::text('description', null, ['class'=>"form-control"]) !!}
    </div>
    
      <div class="form-group">
        {!! Form::label('permission', $fields['permission']) !!}
        
        @if(!empty($permissions))

          @foreach($permissions as $perm)
            @if(isset($role) && $role->hasPermission($perm['name']))
              <br>
              {!! Form::checkbox('permissions[' . $perm['id'] . ']', $perm['display_name'], true) !!}
              {!! $perm['display_name'] !!} 
            @else          
              <br>
              {!! Form::checkbox('permissions[' . $perm['id'] . ']', $perm['display_name']) !!}
              {!! $perm['display_name'] !!} 
            @endif
          @endforeach

        @endif
      </div>
  </div><!-- /.box-body -->

  <div class="box-footer">
    {!! Form::submit($buttons['submit'], ['class' => "btn btn-primary"]) !!}
  </div>