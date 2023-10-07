<?php if($testimonials): ?>	
	<div class="page type-page status-publish hentry group">
        <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        <div class="testimonial two-fourth <?php echo e($k%2 == 1 ? 'last' : ''); ?>">
	            <div class="thumbnail">
	            	<?php if($img = json_decode($testimonial->image)): ?>
	                	<img width="94" height="94" src="<?php echo e(asset(env('THEME'))); ?>/images/testimonials/<?php echo e($img->path); ?>" class="attachment-thumb_testimonial wp-post-image" alt="$testimonial->name" title="$testimonial->name" />
	                <?php endif; ?>            
	            </div>
	            <div class="testimonial-text">
	                <?php echo $testimonial->body; ?>

	            </div>
	            <div class="testimonial-name">
	                <p class="name"><?php echo e($testimonial->name); ?></p>
	                <?php if($testimonial->site_path && $testimonial->site_title): ?>
	                	<a class="website" href="<?php echo e($testimonial->site_path); ?>"><?php echo e($testimonial->site_title); ?> </a>
	                <?php endif; ?>            
	            </div>
	        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
    </div>
<?php endif; ?>