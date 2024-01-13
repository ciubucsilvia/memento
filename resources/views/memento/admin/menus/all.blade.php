
  <div class="box-header">
    <div class="row">
      <div class="col-xs-1">
        <a href="{{ route($page . '.create') }}" title="" class="btn btn-block btn-success btn-xs">{{ $buttons['create'] }}</a>
      </div>

    </div>
      
  </div><!-- /.box-header -->
  
@if(!empty($menus))
  <div class="box-body table-responsive no-padding">
    <table class="table table-hover">
      <tr>
        @foreach($columnsTable as $column)
          <th>{{ $column }}</th>
        @endforeach
        <th></th>
      </tr>
      
      @foreach($menus as $key => $menu)
        <tr>
          <td>{!! $menu->title !!}</td>
          <td></td>
          <td class="pull-right">
            <div class="col-md-5">
              {!! Html::linkRoute('createItemMenu', $buttons['create-item'], ['menu' => $menu->id], ['class' => 'btn btn-success']) !!}
            </div>
            <div class="col-md-3">
              {!! Html::linkRoute('menus.edit', $buttons['edit'], ['menu' => $menu->id], ['class' => 'btn btn-info']) !!}  
            </div>
            <div class="col-md-3">
              {!! Form::open([
                    'method' => 'DELETE',
                    'route' => ['menus.destroy', $menu->id]
                        ]) 
              !!}
              {!! Form::submit($buttons['delete'], ['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}
            </div>
          </td>
        </tr>
        
        @if($menu->items)
          @include(config('settings.theme') . '.admin.menus.item_rows', ['items' => $menu->items->roots(), 'paddingLeft' => '&nbsp;-&nbsp;'])
        @endif

      @endforeach
    </table>
  </div><!-- /.box-body -->
    
@endif