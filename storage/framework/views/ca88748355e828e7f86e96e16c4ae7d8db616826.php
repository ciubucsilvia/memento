
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
<?php if(!empty($categories)): ?>
  <div class="box-body table-responsive no-padding">
    <table class="table table-hover">
      <tr>
        <?php $__currentLoopData = $columnsTable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <th><?php echo e($column); ?></th>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <th></th>
      </tr>
      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($categories->firstItem() + $key); ?></td>
        <td><?php echo e($category->title); ?></td>
        <td><?php echo e($category->alias); ?></td>
        <td><?php echo e($category->type); ?></td>
        <td class="pull-right">
          <div class="col-md-5">
            <?php echo Html::linkRoute('categories.edit', $buttons['edit'], ['category' => $category->id], ['class' => 'btn btn-info']); ?>  
          </div>
          <div class="col-md-3">
            <?php echo Form::open([
                  'method' => 'DELETE',
                  'route' => ['categories.destroy', $category->id]
                      ]); ?>

            <?php echo Form::submit($buttons['delete'], ['class' => 'btn btn-danger']); ?>

            <?php echo Form::close(); ?>

          </div>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </table>
  </div><!-- /.box-body -->

    <?php echo $__env->make(config('settings.theme') . '.admin.parts.pagination', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
    
<?php endif; ?>