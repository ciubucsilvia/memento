
  <div class="box-header">
    <div class="row">
      <div class="col-xs-1">
        <a href="<?php echo e(route($page . '.create')); ?>" title="" class="btn btn-block btn-success btn-xs"><?php echo e($buttons['create']); ?></a>
      </div>
    </div>
      
  </div><!-- /.box-header -->
<?php if(!empty($icons)): ?>
  <div class="box-body table-responsive no-padding">

   

    <table class="table table-hover table-sorting">
      <tr>
        <?php $__currentLoopData = $columnsTable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <th><?php echo e($column); ?></th>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <th></th>
      </tr>
      <tbody>
      <?php $__currentLoopData = $icons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr id="<?php echo e($icon->id); ?>">
          <td>
            <?php echo e(($key + 1)); ?>

          </td>
          <td>
            <?php if($icon->title): ?>
              <?php echo $icon->title; ?>

            <?php endif; ?>
          </td>
          <td><?php echo $icon->class; ?></td>
          <td><?php echo $icon->link; ?></td>
          <td><?php echo $icon->order; ?></td>
          <td class="pull-right">
            <div class="col-md-5">
              <?php echo Html::linkRoute('icons.edit', $buttons['edit'], ['icon' => $icon->id], ['class' => 'btn btn-info']); ?>  
            </div>
            <div class="col-md-3">
              <?php echo Form::open([
                    'method' => 'DELETE',
                    'route' => ['icons.destroy', $icon->id]
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