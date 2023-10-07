  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <?php echo Form::label('title', $fields['title']); ?>

          <?php echo Form::text('title', null, ['class'=>"form-control"]); ?>

        </div>
      </div>

      <div class="col-md-6">
        <br>
        <div class="form-group">
          <?php if(isset($gallery) && $gallery->published): ?>
            <?php echo Form::checkbox('published', $fields['published'], true); ?>

          <?php else: ?> 
            <?php echo Form::checkbox('published'); ?>

          <?php endif; ?>
          <?php echo Form::label('published', $fields['published']); ?>

        </div>
      </div>
    </div>
    
    <div class="form-group image_sticks">
      <?php echo Form::label('image', $fields['image']); ?>

      <?php echo Form::file('image', ['class'=>"form-control"]); ?>

      <div>
      </div>
    </div>

    <?php if(isset($gallery->image)): ?>
      <?php echo Form::hidden('old_image', $gallery->image->min); ?>

      <div class="form-group old_image">
          <?php echo Form::label('img', 'Image gallery'); ?> <br>
          <?php echo Html::image(asset(env('THEME')) . '/images/gallery/' . $gallery->image->min); ?>

      </div>
    <?php endif; ?>

  </div><!-- /.box-body -->

  <div class="box-footer">
    <?php echo Form::submit($buttons['submit'], ['class' => "btn btn-primary"]); ?>

  </div>