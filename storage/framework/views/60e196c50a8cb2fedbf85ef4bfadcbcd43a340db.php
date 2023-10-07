<?php if($portfolios): ?>
    <div id="portfolio-bigimage">
        <?php $__currentLoopData = $portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        <div class="portfolio type-portfolio status-publish hentry work group">
	            <div class="work-thumbnail">
	            	<?php if(isset($portfolio->image->max)): ?>
	            		<a class="thumb img" href="<?php echo e(asset(env('THEME'))); ?>/images/portfolios/<?php echo e($portfolio->image->max); ?>" rel="prettyPhoto[movies]"><img width="617" height="260" src="<?php echo e(asset(env('THEME'))); ?>/images/portfolios/<?php echo e($portfolio->image->max); ?>" class="attachment-thumb_portfolio_big wp-post-image" alt="<?php echo e($portfolio->title); ?>" title="<?php echo e($portfolio->title); ?>" /></a>
	            	<?php endif; ?>
	            </div>
	            <div class="work-description">
	                <h2><?php echo e($portfolio->title); ?></h2>
	                <p><?php echo str_limit($portfolio->body, Config::get('settings.site')['portfolio_description_in_category_page']); ?></p>
	                <a class="read-more btn btn-son-1" href="<?php echo e(route('portfolioShow', ['alias' => $portfolio->alias])); ?>" />
	                	<i class="icon-search"></i> <?php echo e(Lang::get('site.portfolio')['view_project']); ?>

	                </a>                        
	            </div>
	            <div class="clear"></div>
	        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    
    <?php echo $__env->make(env('THEME') . '.site.parts.paginate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>