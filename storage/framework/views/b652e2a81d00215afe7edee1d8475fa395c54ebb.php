<?php if($categories): ?>
	<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<h3><a href="<?php echo e(route('portfoliosCategory', ['alias' => $category->alias])); ?>" title="<?php echo e($category->title); ?>"><?php echo e($category->title); ?></a></h3>
        <div class="portfolio-slider">
            <?php if(count($category->portfolios) > 0): ?>
            <ul>
            	<?php $__currentLoopData = $category->portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                <li class="post">
	                	<?php if($portfolio->image): ?>
	                		<a class="thumb img" href="<?php echo e(asset(env('THEME'))); ?>/images/portfolios/<?php echo e(json_decode($portfolio->image)->path_cat_max); ?>" rel="prettyPhoto[<?php echo e($category->title); ?>]" title="<?php echo e($portfolio->title); ?>"><img width="205" height="118" src="<?php echo e(asset(env('THEME'))); ?>/images/portfolios/<?php echo e(json_decode($portfolio->image)->path_cat_max); ?>" class="attachment-thumb_portfolio_slider wp-post-image" alt="<?php echo e($portfolio->title); ?>" title="<?php echo e($portfolio->title); ?>" /></a>
	                    <?php endif; ?>
	                </li>
	            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <?php endif; ?>
        </div>
        <div class="clear"></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <script src="<?php echo e(asset(env('THEME'))); ?>/js/jquery.jcarousel.min.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('.portfolio-slider').jcarousel({
                    scroll: 1
                });
            });
        </script>
<?php endif; ?>