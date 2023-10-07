  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <?php echo Form::label('name', $fields['name']); ?>

            <?php echo Form::text('name', null, ['class'=>"form-control"]); ?>

        </div> 

        <div class="form-group">
          <?php echo Form::label('password', $fields['password']); ?>

            <?php echo Form::password('password', ['class'=>"form-control"]); ?>

        </div>

        <div class="form-group">
          <?php echo Form::label('password_confirmation', $fields['password_confirmation']); ?>

            <?php echo Form::password('password_confirmation', ['class'=>"form-control"]); ?>

        </div>  
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <?php echo Form::label('email', $fields['email']); ?>

            <?php echo Form::text('email', null, ['class'=>"form-control"]); ?>

        </div>

        <div class="form-group">
          <?php echo Form::label('role', $fields['role']); ?>

            <?php echo Form::select('role', $roles, isset($user) ? $user->roles[0]->id : null, ['class'=>"form-control"]); ?>

        </div>
      </div>
    </div>
     
  </div><!-- /.box-body -->

  <div class="box-footer">
    <?php echo Form::submit($buttons['submit'], ['class' => "btn btn-primary"]); ?>

  </div>