<?php if($sliders): ?>
    <div id="slider" class="slider_elegant group inner">
        <ul class="group">
            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="group">
                    <div class="slider-featured group">
                        <?php if(isset($slider->image->path)): ?>
                            <img src="<?php echo e(asset(config('settings.theme'))); ?>/images/sliders/<?php echo e($slider->image->path); ?>" width="1000" height="338" alt="<?php echo e($slider->title); ?>" />
                        <?php endif; ?>
                    </div>
                    <div class="slider-caption caption-right">
                        <h2><?php echo e($slider->title); ?></h2>
                        <?php echo $slider->body; ?>

                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>

    <script type="text/javascript">      
        var     yiw_slider_type = 'elegant',
                yiw_slider_elegant_easing = null,
                yiw_slider_elegant_fx = 'fade',
                yiw_slider_elegant_speed = 500,
                yiw_slider_elegant_timeout = 5000,
                yiw_slider_elegant_caption_speed = 500;  
    </script>
<?php endif; ?>