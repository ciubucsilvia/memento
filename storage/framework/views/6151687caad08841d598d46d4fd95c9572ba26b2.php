<?php if($articles): ?>
   	<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    	<div class="post type-post status-publish format-standard hentry hentry-post group blog-big">
	        
	        <?php echo $__env->make(env('THEME') . '.site.articleShowContentParts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	        <div class="the-content">
	            <p><?php echo str_limit($article->body, Config::get('settings.site')['article_description_in_blog_page']); ?></p>
	            <p> <a href="<?php echo e(route('articleShow', ['alias' => $article->alias])); ?>" class="more-link"><?php echo e(Lang::get('site.article')['read_more']); ?></a></p>
	        </div>
	    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->make(env('THEME') . '.site.parts.paginate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>