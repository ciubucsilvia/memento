
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
  
<?php if(!empty($articles)): ?>
  <div class="box-body table-responsive no-padding">
    <table class="table table-hover">
      <tr>
        <?php $__currentLoopData = $columnsTable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <th><?php echo e($column); ?></th>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <th></th>
      </tr>
      
      <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($firstItem + $key); ?></td>
          <td><?php echo $article->title; ?></td>
          <td><?php echo e($article->category->title); ?></td>
          <td>
            <?php if(isset($article->image->min)): ?>
              <?php echo Html::image(asset(config('settings.theme')) . '/images/articles/' . $article->image->min); ?>

            <?php endif; ?>
          </td>
          <td><?php echo e($article->published); ?></td>
          <td class="pull-right">
            <div class="col-md-5">
              <?php echo Html::linkRoute('articles.edit', $buttons['edit'], ['article' => $article->id], ['class' => 'btn btn-info']); ?>  
            </div>
            <div class="col-md-3">
              <?php echo Form::open([
                    'method' => 'DELETE',
                    'route' => ['articles.destroy', $article->id]
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