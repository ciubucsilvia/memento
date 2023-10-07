<?php if($faqs): ?>	
	<div class="page type-page status-publish hentry group">
		<?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        <div class="toggle">
	            <p class="tab-index <?php echo e($k == 0 ? 'tab-opened' : 'tab-closed'); ?>"><a href="#" title="Close"><?php echo e($faq->question); ?></a></p>
	            <div class="content-tab <?php echo e($k == 0 ? 'opened' : 'closed'); ?>">
	                <?php echo $faq->answer; ?>

	            </div>
	        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="clear space"></div>
        <div class="call-to-action">
            <div class="incipit">
                <h2>Not found the answer?</h2>
                <p>feel free to contact our customer service for free support</p>
            </div>
            <div class="separate-phone"></div>
            <div class="number-phone">800.034</div>
            <div class="clear"></div>
            <div class="decoration-image"></div>
        </div>
    </div>
<?php endif; ?>