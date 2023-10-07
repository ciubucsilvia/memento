  <div class="box-body">
  
    <div class="form-group">
      <?php echo Form::label('title', $fields['title']); ?>

        <?php echo Form::text('title', null, ['class'=>"form-control"]); ?>

    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <?php echo Form::label('alias', $fields['alias']); ?>

            <?php echo Form::text('alias', null, ['class'=>"form-control"]); ?>

        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <?php echo Form::label('type', $fields['type']); ?>

          <?php echo Form::select('type', $types, isset($category) ? $category->type : null, ['class'=>"form-control"]); ?>

        </div>
      </div>
    </div>       
     
  </div><!-- /.box-body -->

  <div class="box-footer">
    <?php echo Form::submit($buttons['submit'], ['class' => "btn btn-primary"]); ?>

  </div>