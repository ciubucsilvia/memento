<?php if($content): ?>
	<div class="page type-page status-publish hentry group">
	    <h1><?php echo e($content->title); ?></h1>
	    <p><?php echo $content->body; ?></p>
	</div>
<?php endif; ?>