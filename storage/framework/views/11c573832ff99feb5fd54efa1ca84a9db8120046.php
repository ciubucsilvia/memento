<?php echo Form::model($icon, ['route' => ['icons.update', $icon->id], 'method' => 'PUT', 'files' => true]); ?>

	
	<?php echo $__env->make(config('settings.theme') . '.admin.icons.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::close(); ?>