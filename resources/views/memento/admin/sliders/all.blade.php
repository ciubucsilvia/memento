
  <div class="box-header">
    <div class="row">
      <div class="col-xs-1">
        <a href="{{ route($page . '.create') }}" title="" class="btn btn-block btn-success btn-xs">{{ $buttons['create'] }}</a>
      </div>
    </div>
      
  </div><!-- /.box-header -->
@if(!empty($sliders))
  <div class="box-body table-responsive no-padding">

   

    <table class="table table-hover table-sorting">
      <tr>
        @foreach($columnsTable as $column)
          <th>{{ $column }}</th>
        @endforeach
        <th></th>
      </tr>
      <tbody>
      @foreach($sliders as $key => $slider)
        <tr id="{{ $slider->id }}">
          <td>
            {{ ($key + 1) }}
          </td>
          <td>
            @if($slider->title)
              {!! $slider->title !!}
            @endif
          </td>
          <td>
              {!! Html::image(asset(config('settings.theme')) . '/images/sliders/' . $slider->image->min) !!}
          </td>
          <td>{!! $slider->body !!}</td>
          <td class="pull-right">
            <div class="col-md-5">
              {!! Html::linkRoute('sliders.edit', $buttons['edit'], ['slider' => $slider->id], ['class' => 'btn btn-info']) !!}  
            </div>
            <div class="col-md-3">
              {!! Form::open([
                    'method' => 'DELETE',
                    'route' => ['sliders.destroy', $slider->id]
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