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
          <?php echo Form::label('category_id', $fields['category_id']); ?>

            <?php echo Form::select('category_id', $categories, isset($article) ? $article->category->id : null, ['class'=>"form-control"]); ?>

        </div>

        <div class="form-group">
          <?php if(isset($article) && $article->published): ?>
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

        <div class="form-group image_sticks">
          <?php echo Form::label('image', $fields['image']); ?>

          <?php echo Form::file('image', ['class'=>"form-control"]); ?>


          <div>
          </div>
        </div>

        <?php if(isset($article->image)): ?>
          <?php echo Form::hidden('old_image', $article->image->min); ?>

          <div class="form-group old_image">
              <?php echo Form::label('img', 'Image article'); ?> <br>
              <?php echo Html::image(asset(env('THEME')) . '/images/articles/' . $article->image->min); ?>

          </div>
        <?php endif; ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
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