<?php if($posts->lastPage() > 1): ?>
	<div class="general-pagination group">
		
		<?php if($posts->onFirstPage()): ?>
			<a><?php echo e(Lang::get('pagination.previous_post')); ?></a>
		<?php else: ?>
			<a href="<?php echo e($posts->previousPageUrl()); ?>"><?php echo e(Lang::get('pagination.previous_post')); ?></a>
		<?php endif; ?>
		
		<?php for($i = 1; $i <= $posts->lastPage(); $i++): ?>
			<?php if($i == $posts->currentPage()): ?>
				<a class="selected disabled"><?php echo e($i); ?></a>
			<?php else: ?> 
				<a href="<?php echo e($posts->url($i)); ?>"><?php echo e($i); ?></a>
			<?php endif; ?>
		<?php endfor; ?>

		<?php if(!$posts->hasMorePages()): ?>
			<a><?php echo e(Lang::get('pagination.next_post')); ?></a>
		<?php else: ?>
			<a href="<?php echo e($posts->nextPageUrl()); ?>"><?php echo e(Lang::get('pagination.next_post')); ?></a>
		<?php endif; ?>

	</div>
	<div class="clear"></div>
<?php endif; ?>