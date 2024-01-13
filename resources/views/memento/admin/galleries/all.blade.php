
  <div class="box-header">
    <div class="row">
      <div class="col-xs-1">
        <a href="{{ route($page . '.create') }}" title="" class="btn btn-block btn-success btn-xs">{{ $buttons['create'] }}</a>
      </div>

      <div class="col-xs-5">
        @include(config('settings.theme') . '.admin.parts.records')   
      </div>

      <div class="col-xs-6">
        @include(config('settings.theme') . '.admin.parts.search') 
      </div>
    </div>
      
  </div><!-- /.box-header -->
@if(!empty($galleries))
  <div class="box-body table-responsive no-padding">

   

    <table class="table table-hover">
      <tr>
        @foreach($columnsTable as $column)
          <th>{{ $column }}</th>
        @endforeach
        <th></th>
      </tr>
      <tbody>
      @foreach($galleries as $key => $image)
        <tr id="{{ $image->id }}">
          <td>
            {{ $firstItem + $key }}
          </td>
          <td>
            @if($image->title)
              {!! $image->title !!}
            @endif
          </td>
          <td>
              {!! Html::image(asset(config('settings.theme')) . '/images/gallery/' . $image->image->min) !!}
          </td>
          <td>{!! $image->published !!}</td>
          <td class="pull-right">
            <div class="col-md-5">
              {!! Html::linkRoute('gallery.edit', $buttons['edit'], ['gallery' => $image->id], ['class' => 'btn btn-info']) !!}  
            </div>
            <div class="col-md-3">
              {!! Form::open([
                    'method' => 'DELETE',
                    'route' => ['gallery.destroy', $image->id]
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