  <div class="box-body">
    <div class="form-group">
      <?php echo Form::label('title', $fields['title']); ?>

      <?php echo Form::text('title', null, ['class'=>"form-control"]); ?>

    </div>
    
    <div class="form-group image_sticks">
      <?php echo Form::label('image', $fields['image']); ?>

      <?php echo Form::file('image', ['class'=>"form-control"]); ?>


      <div>
      </div>
    </div>

    <?php if(isset($slider->image)): ?>
      <?php echo Form::hidden('old_image', $slider->image->min); ?>

      <div class="form-group old_image">
          <?php echo Form::label('img', 'Image slider'); ?> <br>
          <?php echo Html::image(asset(env('THEME')) . '/images/sliders/' . $slider->image->min); ?>

      </div>
    <?php endif; ?>
    
    <div class="form-group">
      <?php echo Form::label('body', $fields['body']); ?>

        <?php echo Form::textarea('body', null, ['class'=>"form-control", 'id' => 'editor']); ?>

    </div>

  </div><!-- /.box-body -->

  <div class="box-footer">
    <?php echo Form::submit($buttons['submit'], ['class' => "btn btn-primary"]); ?>

  </div>