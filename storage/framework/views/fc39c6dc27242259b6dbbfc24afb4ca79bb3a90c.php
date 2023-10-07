  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <?php echo Form::label('name', $fields['name']); ?>

          <?php echo Form::text('name', null, ['class'=>"form-control"]); ?>

        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <?php echo Form::label('site_title', $fields['site_title']); ?>

          <?php echo Form::text('site_title', null, ['class'=>"form-control"]); ?>

        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group image_sticks">
          <?php echo Form::label('image', $fields['image']); ?>

          <?php echo Form::file('image', ['class'=>"form-control"]); ?>


          <div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <?php echo Form::label('site_path', $fields['site_path']); ?>

          <?php echo Form::text('site_path', null, ['class'=>"form-control"]); ?>

        </div>
      </div>
    </div>

    <?php if(isset($testimonial->image)): ?>
      <?php echo Form::hidden('old_image', $testimonial->image->path); ?>

      <div class="form-group old_image">
          <?php echo Form::label('img', 'Image testimonial'); ?> <br>
          <?php echo Html::image(asset(env('THEME')) . '/images/testimonials/' . $testimonial->image->path); ?>

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