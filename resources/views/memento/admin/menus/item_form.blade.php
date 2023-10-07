  <div class="box-body">
    @if(isset($menu))
      <div class="form-group">
        {!! Form::hidden('menu_id', $menu->id, ['class'=>"form-control"]) !!}
        <h3> {{ $menu->title }} </h3>
      </div>
    @elseif(isset($itemMenu))
      <div class="form-group">
        {!! Form::hidden('menu_id', $itemMenu->menu_id, ['class'=>"form-control"]) !!}
        <h3> {{ $itemMenu->menu->title }} </h3>
      </div>
    @endif
    <div class="form-group">
      {!! Form::label('title', $fields['title']) !!}
      {!! Form::text('title', null, ['class'=>"form-control"]) !!}
    </div>

    <div class="form-group">
      {!! Form::label('path', $fields['path']) !!}
      {!! Form::text('path', null, ['class'=>"form-control"]) !!}
    </div> 

    <div class="form-group">
      {!! Form::label('parent', $fields['parent']) !!}
      {!! Form::select('parent', $parents, isset($itemMenu) ? $itemMenu->parent : null, ['class'=>"form-control"]) !!}
    </div>  
  </div><!-- /.box-body -->

  <div class="box-footer">
    {!! Form::submit($buttons['submit'], ['class' => "btn btn-primary"]) !!}
  </div>
