<?php echo Form::open(['route' => 'pages.store']); ?>

	
	<?php echo $__env->make(config('settings.theme') . '.admin.pages.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::close(); ?>