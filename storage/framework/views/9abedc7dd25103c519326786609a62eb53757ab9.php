
  <div class="box-header">
    <div class="row">
      <div class="col-xs-1">
        <a href="<?php echo e(route($page . '.create')); ?>" title="" class="btn btn-block btn-success btn-xs"><?php echo e($buttons['create']); ?></a>
      </div>
    </div>
      
  </div><!-- /.box-header -->
<?php if(!empty($testimonials)): ?>
  <div class="box-body table-responsive no-padding">

   

    <table class="table table-hover table-sorting">
      <tr>
        <?php $__currentLoopData = $columnsTable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <th><?php echo e($column); ?></th>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <th></th>
      </tr>
      <tbody>
      <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr id="<?php echo e($testimonial->id); ?>">
          <td>
            <?php echo e(($key + 1)); ?>

          </td>
          <td>
            <?php if($testimonial->name): ?>
              <?php echo $testimonial->name; ?>

            <?php endif; ?>
          </td>
          <td>
              <?php echo Html::image(asset(config('settings.theme')) . '/images/testimonials/' . $testimonial->image->path); ?>

          </td>
          <td><?php echo $testimonial->body; ?></td>
          <td class="pull-right">
            <div class="col-md-5">
              <?php echo Html::linkRoute('testimonials.edit', $buttons['edit'], ['testimonial' => $testimonial->id], ['class' => 'btn btn-info']); ?>  
            </div>
            <div class="col-md-3">
              <?php echo Form::open([
                    'method' => 'DELETE',
                    'route' => ['testimonials.destroy', $testimonial->id]
                        ]); ?>

              <?php echo Form::submit($buttons['delete'], ['class' => 'btn btn-danger']); ?>

              <?php echo Form::close(); ?>

            </div>
          </td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div><!-- /.box-body -->
<?php endif; ?>