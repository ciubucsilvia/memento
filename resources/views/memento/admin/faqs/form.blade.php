  <div class="box-body">

    <div class="form-group">
      {!! Form::label('question', $fields['question']) !!}
        {!! Form::textarea('question', null, ['class'=>"form-control"]) !!}
    </div>

    <div class="form-group">
      {!! Form::label('answer', $fields['answer']) !!}
        {!! Form::textarea('answer', null, ['class'=>"form-control", 'id' => 'editor']) !!}
    </div>

    <div class="form-group">
      @if(isset($faq) && $faq->published)
        {!! Form::checkbox('published', $fields['published'], true) !!}
      @else 
        {!! Form::checkbox('published') !!}
      @endif
      {!! Form::label('published', $fields['published']) !!}
    </div>

  </div><!-- /.box-body -->

  <div class="box-footer">
    {!! Form::submit($buttons['submit'], ['class' => "btn btn-primary"]) !!}
  </div>