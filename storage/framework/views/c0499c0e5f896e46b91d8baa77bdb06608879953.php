<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<li <?php echo e((URL::current() == $item->url()) ? "class=active" : ''); ?>>
		<a href="<?php echo e($item->url()); ?>"><?php echo e($item->title); ?></a>
		<?php if($item->hasChildren()): ?>
			 <ul class="sub-menu">
			 <?php echo $__env->make(env('THEME') . '.parts.customMenuItems', ['items'=>$item->children()], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			 </ul>
		<?php endif; ?>
	</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>