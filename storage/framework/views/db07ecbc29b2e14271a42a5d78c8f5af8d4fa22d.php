<?php echo Form::model($menu, ['route' => ['menus.update', $menu->id], 'method' => 'PUT']); ?>

	
	<?php echo $__env->make(config('settings.theme') . '.admin.menus.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::close(); ?>