  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <?php echo Form::label('title', $fields['title']); ?>

          <?php echo Form::text('title', null, ['class'=>"form-control"]); ?>

        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <?php echo Form::label('class', $fields['class']); ?>

          <?php echo Form::text('class', null, ['class'=>"form-control"]); ?>

        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          <?php echo Form::label('icon', $fields['icon']); ?>

          <?php echo Form::text('icon', null, ['class'=>"form-control"]); ?>

        </div>
      </div>
    </div>
      
    <div class="form-group">
      <?php echo Form::label('link', $fields['link']); ?>

      <?php echo Form::text('link', null, ['class'=>"form-control"]); ?>

    </div>

  </div><!-- /.box-body -->

  <div class="box-footer">
    <?php echo Form::submit($buttons['submit'], ['class' => "btn btn-primary"]); ?>

  </div>