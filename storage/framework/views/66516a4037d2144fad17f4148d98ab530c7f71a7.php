<?php $__env->startSection('title'); ?>
	<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_desc'); ?>
	<?php echo e($meta_desc); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('keywords'); ?>
	<?php echo e($keywords); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('logo'); ?>
	<?php echo $logo; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('navigation'); ?>
	<?php echo $navigation; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
	<?php echo $footer; ?>

<?php $__env->stopSection(); ?>







<?php $__env->startSection('pageTitle'); ?>
	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('slider'); ?>
	<?php echo $slider; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sideBar'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('projectsIndex'); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make(config('settings.theme') . '.layouts.site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>