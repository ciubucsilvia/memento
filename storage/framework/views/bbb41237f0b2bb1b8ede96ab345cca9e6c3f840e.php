<?php echo Form::model($testimonial, ['route' => ['testimonials.update', $testimonial->id], 'method' => 'PUT', 'files' => true]); ?>

	
	<?php echo $__env->make(config('settings.theme') . '.admin.testimonials.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::close(); ?>