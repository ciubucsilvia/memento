<?php echo Form::open(['route' => 'roles.store']); ?>

	
	<?php echo $__env->make(config('settings.theme') . '.admin.roles.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::close(); ?>