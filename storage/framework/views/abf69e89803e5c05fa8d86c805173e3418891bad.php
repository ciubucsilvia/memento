<?php if($article): ?>
    <div class="clear"></div>
    
    <div class="post type-post status-publish format-standard hentry hentry-post group blog-big">

    	<?php echo $__env->make(env('THEME') . '.site.articleShowContentParts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="clearer"></div>
        <div class="the-content-single">
            <p><?php echo $article->body; ?></p>
        </div>
    </div>
    
    <div id="comments">
    	<?php echo $__env->make(env('THEME') . '.site.comments', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php endif; ?>