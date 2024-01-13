  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          {!! Form::label('title', $fields['title']) !!}
            {!! Form::text('title', null, ['class'=>"form-control"]) !!}
        </div> 

        <div class="form-group">
          {!! Form::label('alias', $fields['alias']) !!}
            {!! Form::text('alias', null, ['class'=>"form-control"]) !!}
        </div>

        <div class="form-group">
          {!! Form::label('category_id', $fields['category_id']) !!}
            {!! Form::select('category_id', $categories, isset($portfolio) ? $portfolio->category->id : null, ['class'=>"form-control"]) !!}
        </div>

        <div class="form-group">
          @if(isset($portfolio) && $portfolio->published)
            {!! Form::checkbox('published', $fields['published'], true) !!}
          @else 
            {!! Form::checkbox('published') !!}
          @endif
          {!! Form::label('published', $fields['published']) !!}
        </div>
      </div>

      <div class="col-md-6">
        {{-- <div class="form-group">
          {!! Form::label('keywords', $fields['keywords']) !!}
            {!! Form::text('keywords', null, ['class'=>"form-control"]) !!}
        </div> --}}

        <div class="form-group">
          {!! Form::label('meta_desc', $fields['meta_desc']) !!}
            {!! Form::text('meta_desc', null, ['class'=>"form-control"]) !!}
        </div>

        <div class="form-group image_sticks">
          {!! Form::label('image', $fields['image']) !!}
          {!! Form::file('image', ['class'=>"form-control"]) !!}

          <div>
          </div>
        </div>

        @if(isset($portfolio->image))
          {!! Form::hidden('old_image', $portfolio->image->min) !!}
          <div class="form-group old_image">
              {!! Form::label('img', 'Image portfolio') !!} <br>
              {!! Html::image(asset(env('THEME')) . '/images/portfolios/' . $portfolio->image->min) !!}
          </div>
        @endif
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          {!! Form::label('body', $fields['body']) !!}
            {!! Form::textarea('body', null, ['class'=>"form-control", 'id' => 'editor']) !!}
        </div>
      </div>
    </div>
     
  </div><!-- /.box-body -->

  <div class="box-footer">
    {!! Form::submit($buttons['submit'], ['class' => "btn btn-primary"]) !!}
  </div>