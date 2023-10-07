<div id="nav" class="group">
    <ul id="menu-main-nav" class="level-1">

        <?php $__currentLoopData = $menu->roots(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li <?php echo e((URL::current() == $item->url()) ? "class=active" : ''); ?>>
                <a href="<?php echo e($item->url()); ?>"><?php echo e($item->title); ?></a>
                <?php if($item->hasChildren()): ?>
                     <ul class="sub-menu">
                     <?php echo $__env->make(env('THEME') . '.site.parts.customMenuItems', ['items'=>$item->children()], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                     </ul>
                <?php endif; ?>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       
    </ul>
</div>