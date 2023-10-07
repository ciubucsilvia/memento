<?php echo Form::model($permission, ['route' => ['permissions.update', $permission->id], 'method' => 'PUT']); ?>

	
	<?php echo $__env->make(config('settings.theme') . '.admin.permissions.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::close(); ?>