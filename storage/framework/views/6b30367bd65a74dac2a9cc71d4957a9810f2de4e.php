<?php $__env->startSection('title'); ?>
	<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('navigation'); ?>
  <?php echo $navigation; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
	<?php echo $sidebar; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
   <div class="error-page">
    <h2 class="headline text-yellow"> 403</h2>
    <div class="error-content">
      <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
      <p>
        We could not find the page you were looking for.
        Meanwhile, you may <a href='/'>return to dashboard</a>.
      </p>
      <br><br><br><br><br><br>
    </div><!-- /.error-content -->
  </div><!-- /.error-page -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make(env('theme') . '.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>