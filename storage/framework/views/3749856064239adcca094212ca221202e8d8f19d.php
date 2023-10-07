<?php echo Form::model($gallery, ['route' => ['gallery.update', $gallery->id], 'method' => 'PUT', 'files' => true]); ?>

	
	<?php echo $__env->make(config('settings.theme') . '.admin.galleries.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::close(); ?>