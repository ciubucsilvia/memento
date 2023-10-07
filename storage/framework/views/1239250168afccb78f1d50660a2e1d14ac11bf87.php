  <div class="box-body">
    <div class="form-group">
    	<?php echo Form::label('name', $fields['name']); ?>

      	<?php echo Form::text('name', null, ['class'=>"form-control"]); ?>

    </div>
    <div class="form-group">
    	<?php echo Form::label('display_name', $fields['display_name']); ?>

      	<?php echo Form::text('display_name', null, ['class'=>"form-control"]); ?>

    </div>
    <div class="form-group">
    	<?php echo Form::label('description', $fields['description']); ?>

      	<?php echo Form::text('description', null, ['class'=>"form-control"]); ?>

    </div>
  </div><!-- /.box-body -->

  <div class="box-footer">
    <?php echo Form::submit($buttons['submit'], ['class' => "btn btn-primary"]); ?>

  </div>