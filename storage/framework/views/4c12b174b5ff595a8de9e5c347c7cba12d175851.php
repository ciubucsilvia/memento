
  <div class="box-header">
    <div class="row">
      <div class="col-xs-1">
        <a href="<?php echo e(route($page . '.create')); ?>" title="" class="btn btn-block btn-success btn-xs"><?php echo e($buttons['create']); ?></a>
      </div>

    </div>
      
  </div><!-- /.box-header -->
  
<?php if(!empty($menus)): ?>
  <div class="box-body table-responsive no-padding">
    <table class="table table-hover">
      <tr>
        <?php $__currentLoopData = $columnsTable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <th><?php echo e($column); ?></th>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <th></th>
      </tr>
      
      <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo $menu->title; ?></td>
          <td></td>
          <td class="pull-right">
            <div class="col-md-5">
              <?php echo Html::linkRoute('createItemMenu', $buttons['create-item'], ['menu' => $menu->id], ['class' => 'btn btn-success']); ?>

            </div>
            <div class="col-md-3">
              <?php echo Html::linkRoute('menus.edit', $buttons['edit'], ['menu' => $menu->id], ['class' => 'btn btn-info']); ?>  
            </div>
            <div class="col-md-3">
              <?php echo Form::open([
                    'method' => 'DELETE',
                    'route' => ['menus.destroy', $menu->id]
                        ]); ?>

              <?php echo Form::submit($buttons['delete'], ['class' => 'btn btn-danger']); ?>

              <?php echo Form::close(); ?>

            </div>
          </td>
        </tr>
        
        <?php if($menu->items): ?>
          <?php echo $__env->make(config('settings.theme') . '.admin.menus.item_rows', ['items' => $menu->items->roots(), 'paddingLeft' => '&nbsp;-&nbsp;'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
  </div><!-- /.box-body -->
    
<?php endif; ?>