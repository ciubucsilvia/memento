<?php $__env->startSection('title'); ?>
	<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('navigation'); ?>
	<?php echo $navigation; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
	<?php echo $sidebar; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('alert'); ?>
	<?php echo $alert; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php echo $content; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
	<?php echo $footer; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make(env('theme') . '.layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>