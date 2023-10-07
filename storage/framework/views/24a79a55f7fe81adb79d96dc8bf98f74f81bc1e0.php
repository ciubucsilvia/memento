<?php echo Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'PUT']); ?>

	
	<?php echo $__env->make(config('settings.theme') . '.admin.roles.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::close(); ?>