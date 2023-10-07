<?php echo Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']); ?>

	
	<?php echo $__env->make(config('settings.theme') . '.admin.users.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::close(); ?>