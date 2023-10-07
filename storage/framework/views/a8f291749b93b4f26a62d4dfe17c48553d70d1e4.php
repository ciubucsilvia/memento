  <div class="box-body">
        <div class="form-group">
          <?php echo Form::label('title', $fields['title']); ?>

          <?php echo Form::text('title', null, ['class'=>"form-control"]); ?>

        </div>
  </div><!-- /.box-body -->

  <div class="box-footer">
    <?php echo Form::submit($buttons['submit'], ['class' => "btn btn-primary"]); ?>

  </div>
