<?php if($gallery): ?>
    <div id="rg-gallery" class="rg-gallery">
        <div class="rg-thumbs">
            <!-- Elastislide Carousel Thumbnail Viewer -->
            <div class="es-carousel-wrapper">
                <div class="es-nav">
                    <span class="es-nav-prev">Previous</span>
                    <span class="es-nav-next">Next</span>
                </div>
                <div class="es-carousel">
                    <ul>
                    	<?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    		<?php if($item->image->min): ?>
		                        <li>
		                            <a href="#">
		                            <img src="<?php echo e(asset(env('THEME'))); ?>/images/gallery/<?php echo e($item->image->min); ?>" data-large="<?php echo e(asset(env('THEME'))); ?>/images/gallery/<?php echo e($item->image->path); ?>" alt="<?php echo e($item->title); ?>" data-description="<?php echo e($item->title); ?>" />
		                            </a>
		                        </li>
		                    <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script type='text/javascript' src='<?php echo e(asset(env("THEME"))); ?>/js/jquery.tmpl.min.js'></script>
    <script type='text/javascript' src='<?php echo e(asset(env("THEME"))); ?>/js/jquery.elastislide.js'></script>
	<script type='text/javascript' src='<?php echo e(asset(env("THEME"))); ?>/js/gallery.js'></script>
	<script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">
	    <div class="rg-image-wrapper">
	        
	            <div class="rg-image-nav">
	                <a href="#" class="rg-image-nav-prev">Previous Image</a>
	                <a href="#" class="rg-image-nav-next">Next Image</a>
	            </div>
	        
	        <div class="rg-image"></div>
	        <div class="rg-loading"></div>
	    </div>      
	    <div class="rg-caption-wrapper">
	        <div class="rg-caption" style="display:none;">
	            <p></p>
	        </div>
	    </div>
	</script>
<?php endif; ?>