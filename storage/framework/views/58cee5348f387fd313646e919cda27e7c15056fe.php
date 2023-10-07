
  <div class="box-header">
    <div class="row">
      <div class="col-xs-1">
        <a href="<?php echo e(route($page . '.create')); ?>" title="" class="btn btn-block btn-success btn-xs"><?php echo e($buttons['create']); ?></a>
      </div>
    </div>
      
  </div><!-- /.box-header -->
<?php if(!empty($sliders)): ?>
  <div class="box-body table-responsive no-padding">

   

    <table class="table table-hover table-sorting">
      <tr>
        <?php $__currentLoopData = $columnsTable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <th><?php echo e($column); ?></th>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <th></th>
      </tr>
      <tbody>
      <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr id="<?php echo e($slider->id); ?>">
          <td>
            <?php echo e(($key + 1)); ?>

          </td>
          <td>
            <?php if($slider->title): ?>
              <?php echo $slider->title; ?>

            <?php endif; ?>
          </td>
          <td>
              <?php echo Html::image(asset(config('settings.theme')) . '/images/sliders/' . $slider->image->min); ?>

          </td>
          <td><?php echo $slider->body; ?></td>
          <td class="pull-right">
            <div class="col-md-5">
              <?php echo Html::linkRoute('sliders.edit', $buttons['edit'], ['slider' => $slider->id], ['class' => 'btn btn-info']); ?>  
            </div>
            <div class="col-md-3">
              <?php echo Form::open([
                    'method' => 'DELETE',
                    'route' => ['sliders.destroy', $slider->id]
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