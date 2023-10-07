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
    
      <div class="form-group">
        <?php echo Form::label('permission', $fields['permission']); ?>

        
        <?php if(!empty($permissions)): ?>

          <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(isset($role) && $role->hasPermission($perm['name'])): ?>
              <br>
              <?php echo Form::checkbox('permissions[' . $perm['id'] . ']', $perm['display_name'], true); ?>

              <?php echo $perm['display_name']; ?> 
            <?php else: ?>          
              <br>
              <?php echo Form::checkbox('permissions[' . $perm['id'] . ']', $perm['display_name']); ?>

              <?php echo $perm['display_name']; ?> 
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php endif; ?>
      </div>
  </div><!-- /.box-body -->

  <div class="box-footer">
    <?php echo Form::submit($buttons['submit'], ['class' => "btn btn-primary"]); ?>

  </div>