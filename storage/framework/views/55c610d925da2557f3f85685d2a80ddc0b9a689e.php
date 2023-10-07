    <h3 id="comments-title">
        <span><?php echo e(count($article->comments)); ?></span> <?php echo e(Lang::choice('site.article.comments', count($article->comments))); ?>			
    </h3>

    <?php if(count($article->comments) > 0): ?>
        <?php $com =  $article->comments->groupBy('parent_id') ?>
        
        <ol class="commentlist group">
            <?php $__currentLoopData = $com; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $comments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($k !== 0): ?>
                    <?php break; ?>
                <?php endif; ?>

                <?php echo $__env->make(env('THEME') . '.site.comment', ['items'=>$comments], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>        
    <?php endif; ?>
    
    <!-- START TRACKBACK & PINGBACK -->
    <h2 id="trackbacks">Trackback e pingback</h2>
    <ol class="trackbacklist">
    </ol>
    <p><em>No trackback or pingback available for this article</em></p>
    <!-- END TRACKBACK & PINGBACK -->
    
    <?php echo $__env->make(env('THEME') . '.site.add_comment', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>