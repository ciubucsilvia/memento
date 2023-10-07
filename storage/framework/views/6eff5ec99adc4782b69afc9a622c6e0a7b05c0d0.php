    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td>
          <?php echo e($paddingLeft); ?> 
          <?php echo $item->title; ?>

      </td>
      <td><?php echo $item->url(); ?></td>
      <td class="pull-right">
        <div class="col-md-5">
          <?php echo Html::linkRoute('menus-item.edit', $buttons['edit'], ['menus-item' => $item->id], ['class' => 'btn btn-info']); ?>  
        </div>
        <div class="col-md-3">
          <?php echo Form::open([
                'method' => 'DELETE',
                'route' => ['menus-item.destroy', $item->id]
                    ]); ?>

          <?php echo Form::submit($buttons['delete'], ['class' => 'btn btn-danger']); ?>

          <?php echo Form::close(); ?>

        </div>
      </td>
    </tr>
    <?php if($item->hasChildren()): ?>
      <?php echo $__env->make(config('settings.theme') . '.admin.menus.item_rows', ['items' => $item->children(), 'paddingLeft' => $paddingLeft . '&nbsp;-&nbsp;'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
    
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>