<?php echo Form::open(['route' => 'sliders.store', 'files' => true]); ?>

	
	<?php echo $__env->make(config('settings.theme') . '.admin.sliders.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::close(); ?>