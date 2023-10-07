<?php echo Form::model($itemMenu, ['route' => ['menus-item.update', $itemMenu->id], 'method' => 'PUT']); ?>

	
	<?php echo $__env->make(config('settings.theme') . '.admin.menus.item_form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::close(); ?>