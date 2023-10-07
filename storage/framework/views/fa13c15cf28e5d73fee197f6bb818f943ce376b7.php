<?php echo Form::model($slider, ['route' => ['sliders.update', $slider->id], 'method' => 'PUT', 'files' => true]); ?>

	
	<?php echo $__env->make(config('settings.theme') . '.admin.sliders.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::close(); ?>