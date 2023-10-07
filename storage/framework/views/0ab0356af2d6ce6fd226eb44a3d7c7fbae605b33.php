  <div class="box-body">
    <?php if(isset($menu)): ?>
      <div class="form-group">
        <?php echo Form::hidden('menu_id', $menu->id, ['class'=>"form-control"]); ?>

        <h3> <?php echo e($menu->title); ?> </h3>
      </div>
    <?php elseif(isset($itemMenu)): ?>
      <div class="form-group">
        <?php echo Form::hidden('menu_id', $itemMenu->menu_id, ['class'=>"form-control"]); ?>

        <h3> <?php echo e($itemMenu->menu->title); ?> </h3>
      </div>
    <?php endif; ?>
    <div class="form-group">
      <?php echo Form::label('title', $fields['title']); ?>

      <?php echo Form::text('title', null, ['class'=>"form-control"]); ?>

    </div>

    <div class="form-group">
      <?php echo Form::label('path', $fields['path']); ?>

      <?php echo Form::text('path', null, ['class'=>"form-control"]); ?>

    </div> 

    <div class="form-group">
      <?php echo Form::label('parent', $fields['parent']); ?>

      <?php echo Form::select('parent', $parents, isset($itemMenu) ? $itemMenu->parent : null, ['class'=>"form-control"]); ?>

    </div>  
  </div><!-- /.box-body -->

  <div class="box-footer">
    <?php echo Form::submit($buttons['submit'], ['class' => "btn btn-primary"]); ?>

  </div>
