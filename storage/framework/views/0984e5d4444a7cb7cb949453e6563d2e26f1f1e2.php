<?php echo Form::model($article, ['route' => ['articles.update', $article->id], 'method' => 'PUT', 'files' => true]); ?>

	
	<?php echo $__env->make(config('settings.theme') . '.admin.articles.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::close(); ?>