  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <?php echo Form::label('title', $fields['title']); ?>

            <?php echo Form::text('title', null, ['class'=>"form-control"]); ?>

        </div> 

        <div class="form-group">
          <?php echo Form::label('alias', $fields['alias']); ?>

            <?php echo Form::text('alias', null, ['class'=>"form-control"]); ?>

        </div>

        <div class="form-group">
          <?php if(isset($page) && $page->published): ?>
            <?php echo Form::checkbox('published', $fields['published'], true); ?>

          <?php else: ?> 
            <?php echo Form::checkbox('published'); ?>

          <?php endif; ?>
          <?php echo Form::label('published', $fields['published']); ?>

        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <?php echo Form::label('keywords', $fields['keywords']); ?>

            <?php echo Form::text('keywords', null, ['class'=>"form-control"]); ?>

        </div>

        <div class="form-group">
          <?php echo Form::label('meta_desc', $fields['meta_desc']); ?>

            <?php echo Form::text('meta_desc', null, ['class'=>"form-control"]); ?>

        </div>
      </div>
    </div>

    <div class="row">
      <div>
        <div class="form-group">
          <?php echo Form::label('body', $fields['body']); ?>

            <?php echo Form::textarea('body', null, ['class'=>"form-control", 'id' => 'editor']); ?>

        </div>
      </div>
    </div>
     
  </div><!-- /.box-body -->

  <div class="box-footer">
    <?php echo Form::submit($buttons['submit'], ['class' => "btn btn-primary"]); ?>

  </div>