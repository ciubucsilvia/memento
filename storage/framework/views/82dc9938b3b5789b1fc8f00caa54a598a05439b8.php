<?php if($projects): ?>
    <div class="inner home-portfolio home-services home-section group">
        <h2><?php echo Lang::get('site.index')['index_projects']; ?></h2>
        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="hentry-post group <?php echo e($k == 0 ? 'first' : $k == 3 ? 'last' : ''); ?>">
                <?php if($project->image->path_index): ?>
                    <div class="thumb-img"><a href="<?php echo e(route('portfolioShow', ['alias' => $project->alias])); ?>" title="<?php echo e($project->title); ?>" class="title"><img width="208" height="168" src="<?php echo e(env('THEME')); ?>/images/portfolios/<?php echo e($project->image->path_index); ?>" class="attachment-thumb_filterable wp-post-image" alt="<?php echo e($project->title); ?>" title="<?php echo e($project->title); ?>" /></a></div>
                <?php endif; ?>
                <h3><a href="<?php echo e(route('portfolioShow', ['alias' => $project->alias])); ?>" title="<?php echo e($project->title); ?>" class="title"><?php echo e($project->title); ?></a></h3>
                <p><?php echo str_limit($project->body, 
                    Config::get('settings.site')['project_description_in_index_page'], strlen($project->body) <= Config::get('settings.site')['project_description_in_index_page'] ? null : '...'); ?></p>
                <p><a href="<?php echo e(route('portfolioShow', ['alias' => $project->alias])); ?>" class="btn btn-retro-package-3 btn-more-link"><i class="icon-list" style="font-size: 14px;"></i>   Read more</a></p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>