<?php echo Form::open(['route' => 'categories.store']); ?>

	
	<?php echo $__env->make(config('settings.theme') . '.admin.categories.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::close(); ?>