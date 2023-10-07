<?php if($sliders): ?>

            <div id="slider" class="ei-slider elastic">
                
                <div class="ei-slider-loading">Loading</div>
                
                <ul class="ei-slider-large">
                    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="first slide-1 slide align- image-content-type">
                        <img src="<?php echo e(asset(config('settings.theme'))); ?>/images/sliders/<?php echo e($slider->image->path); ?>" width="1920" height="400" alt="Love the sport" />
                        <div class="ei-title">
                            <h2>Love the sport</h2>
                            <h3>..feel the music</h3>
                        </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                
                <!-- ei-slider-large -->
  <!--               <ul class="ei-slider-thumbs">
                    <li class="ei-slider-element">Current</li>
                    <li><a href="#">Love the sport - ..feel the music</a><img src="images/slider-elastic/sci1-150x59.jpg" alt="Love the sport - ..feel the music" /></li>
                    <li><a href="#">Love the red fruit.. - ..fruit of passion</a><img src="images/slider-elastic/red-passion-150x59.jpg" alt="Love the red fruit.. - ..fruit of passion" /></li>
                    <li><a href="#"> - </a><img src="images/slider-elastic/cropped-0012-150x59.jpg" alt=" - " /></li>
                </ul> -->
                <!-- ei-slider-thumbs -->    
                <div class="shadow"></div>
            </div>
            <!-- ei-slider -->    
            <!-- END #slider -->
            <script type="text/javascript">      
                var     yiw_slider_type = 'elastic',
                        yiw_slider_elastic_speed = 800,
                        yiw_slider_elastic_timeout = 3000,
                        yiw_slider_elastic_autoplay = true,
                        yiw_slider_elastic_animation = 'sides';
            </script>




<div id="slider" class="slider_elegant group inner">
                <ul class="group">
                    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="group">
                        <div class="slider-featured group">
                            <img src="<?php echo e(asset(config('settings.theme'))); ?>/images/sliders/<?php echo e($slider->image->path); ?>" width="1000" height="338" alt="WOMAN COLLECTION" />
                        </div>
                        <div class="slider-caption caption-right">
                            <h2><?php echo e($slider->title); ?></h2>
                            <p><?php echo $slider->body; ?></p>
                        </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <!-- END SLIDER -->
            <script type="text/javascript">      
                    var     yiw_slider_type = 'elegant',
                            yiw_slider_elegant_easing = null,
                            yiw_slider_elegant_fx = 'fade',
                            yiw_slider_elegant_speed = 500,
                            yiw_slider_elegant_timeout = 5000,
                            yiw_slider_elegant_caption_speed = 500;  
            </script>
<?php endif; ?>