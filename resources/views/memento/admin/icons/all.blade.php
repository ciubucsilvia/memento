
  <div class="box-header">
    <div class="row">
      <div class="col-xs-1">
        <a href="{{ route($page . '.create') }}" title="" class="btn btn-block btn-success btn-xs">{{ $buttons['create'] }}</a>
      </div>
    </div>
      
  </div><!-- /.box-header -->
@if(!empty($icons))
  <div class="box-body table-responsive no-padding">

   

    <table class="table table-hover table-sorting">
      <tr>
        @foreach($columnsTable as $column)
          <th>{{ $column }}</th>
        @endforeach
        <th></th>
      </tr>
      <tbody>
      @foreach($icons as $key => $icon)
        <tr id="{{ $icon->id }}">
          <td>
            {{ ($key + 1) }}
          </td>
          <td>
            @if($icon->title)
              {!! $icon->title !!}
            @endif
          </td>
          <td>{!! $icon->class !!}</td>
          <td>{!! $icon->link !!}</td>
          <td>{!! $icon->order !!}</td>
          <td class="pull-right">
            <div class="col-md-5">
              {!! Html::linkRoute('icons.edit', $buttons['edit'], ['icon' => $icon->id], ['class' => 'btn btn-info']) !!}  
            </div>
            <div class="col-md-3">
              {!! Form::open([
                    'method' => 'DELETE',
                    'route' => ['icons.destroy', $icon->id]
                        ]) 
              !!}
              {!! Form::submit($buttons['delete'], ['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}
            </div>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div><!-- /.box-body -->
@endif