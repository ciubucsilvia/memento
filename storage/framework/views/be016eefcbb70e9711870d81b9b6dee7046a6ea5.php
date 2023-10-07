  <div class="box-body">

    <div class="form-group">
      <?php echo Form::label('question', $fields['question']); ?>

        <?php echo Form::textarea('question', null, ['class'=>"form-control"]); ?>

    </div>

    <div class="form-group">
      <?php echo Form::label('answer', $fields['answer']); ?>

        <?php echo Form::textarea('answer', null, ['class'=>"form-control", 'id' => 'editor']); ?>

    </div>

    <div class="form-group">
      <?php if(isset($faq) && $faq->published): ?>
        <?php echo Form::checkbox('published', $fields['published'], true); ?>

      <?php else: ?> 
        <?php echo Form::checkbox('published'); ?>

      <?php endif; ?>
      <?php echo Form::label('published', $fields['published']); ?>

    </div>

  </div><!-- /.box-body -->

  <div class="box-footer">
    <?php echo Form::submit($buttons['submit'], ['class' => "btn btn-primary"]); ?>

  </div>