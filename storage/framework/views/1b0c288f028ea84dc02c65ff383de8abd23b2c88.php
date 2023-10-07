
  <div class="box-header">
    <div class="row">
      <div class="col-xs-1">
        <a href="<?php echo e(route($page . '.create')); ?>" title="" class="btn btn-block btn-success btn-xs"><?php echo e($buttons['create']); ?></a>
      </div>

      <div class="col-xs-5">
        <?php echo $__env->make(config('settings.theme') . '.admin.parts.records', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>   
      </div>

      <div class="col-xs-6">
        <?php echo $__env->make(config('settings.theme') . '.admin.parts.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
      </div>
    </div>
      
  </div><!-- /.box-header -->
<?php if(!empty($galleries)): ?>
  <div class="box-body table-responsive no-padding">

   

    <table class="table table-hover">
      <tr>
        <?php $__currentLoopData = $columnsTable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <th><?php echo e($column); ?></th>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <th></th>
      </tr>
      <tbody>
      <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr id="<?php echo e($image->id); ?>">
          <td>
            <?php echo e($firstItem + $key); ?>

          </td>
          <td>
            <?php if($image->title): ?>
              <?php echo $image->title; ?>

            <?php endif; ?>
          </td>
          <td>
              <?php echo Html::image(asset(config('settings.theme')) . '/images/gallery/' . $image->image->min); ?>

          </td>
          <td><?php echo $image->published; ?></td>
          <td class="pull-right">
            <div class="col-md-5">
              <?php echo Html::linkRoute('gallery.edit', $buttons['edit'], ['gallery' => $image->id], ['class' => 'btn btn-info']); ?>  
            </div>
            <div class="col-md-3">
              <?php echo Form::open([
                    'method' => 'DELETE',
                    'route' => ['gallery.destroy', $image->id]
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