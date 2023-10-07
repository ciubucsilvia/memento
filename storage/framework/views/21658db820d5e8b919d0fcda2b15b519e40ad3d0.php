    <div class="widget-first widget-last widget recent-posts">
        <h3><?php echo e(Lang::get('site.index')['lastArticles']); ?></h3>
        <div class="recent-post group">
            <?php if($articles): ?>
                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="hentry-post group">
                        <?php if($article->image->min): ?>
                            <div class="thumb-img"><img width="55" height="55" src="<?php echo e(asset(env('THEME'))); ?>/images/articles/<?php echo e($article->image->min); ?>" class="attachment-thumb_recentposts wp-post-image" alt="<?php echo e($article->title); ?>" title="<?php echo e($article->title); ?>" /></div>
                        <?php endif; ?>
                        <a href="<?php echo e(route('articleShow', ['alias' => $article->alias])); ?>" title="<?php echo e($article->title); ?>" class="title"><?php echo e($article->title); ?></a>
                        <?php if($article->created_at): ?>
                            <p class="post-date"><?php echo e($article->created_at->format('M j, Y')); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>