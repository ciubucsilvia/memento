
<?php if(count($errors) > 0): ?>
    <div class="box error-box">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p><?php echo $error; ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>

<?php if(session('status')): ?>
    <div class="box info-box">
        <p><?php echo session('status'); ?></p>
    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="box error-box">
        </p><?php echo session('error'); ?></p>
    </div>
<?php endif; ?>