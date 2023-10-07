  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          {!! Form::label('name', $fields['name']) !!}
            {!! Form::text('name', null, ['class'=>"form-control"]) !!}
        </div> 

        <div class="form-group">
          {!! Form::label('password', $fields['password']) !!}
            {!! Form::password('password', ['class'=>"form-control"]) !!}
        </div>

        <div class="form-group">
          {!! Form::label('password_confirmation', $fields['password_confirmation']) !!}
            {!! Form::password('password_confirmation', ['class'=>"form-control"]) !!}
        </div>  
      </div>

      <div class="col-md-6">
        <div class="form-group">
          {!! Form::label('email', $fields['email']) !!}
            {!! Form::text('email', null, ['class'=>"form-control"]) !!}
        </div>

        <div class="form-group">
          {!! Form::label('role', $fields['role']) !!}
            {!! Form::select('role', $roles, isset($user) ? $user->roles[0]->id : null, ['class'=>"form-control"]) !!}
        </div>
      </div>
    </div>
     
  </div><!-- /.box-body -->

  <div class="box-footer">
    {!! Form::submit($buttons['submit'], ['class' => "btn btn-primary"]) !!}
  </div>