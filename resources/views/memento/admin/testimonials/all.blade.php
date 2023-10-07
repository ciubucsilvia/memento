
  <div class="box-header">
    <div class="row">
      <div class="col-xs-1">
        <a href="{{ route($page . '.create') }}" title="" class="btn btn-block btn-success btn-xs">{{ $buttons['create'] }}</a>
      </div>
    </div>
      
  </div><!-- /.box-header -->
@if(!empty($testimonials))
  <div class="box-body table-responsive no-padding">

   

    <table class="table table-hover table-sorting">
      <tr>
        @foreach($columnsTable as $column)
          <th>{{ $column }}</th>
        @endforeach
        <th></th>
      </tr>
      <tbody>
      @foreach($testimonials as $key => $testimonial)
        <tr id="{{ $testimonial->id }}">
          <td>
            {{ ($key + 1) }}
          </td>
          <td>
            @if($testimonial->name)
              {!! $testimonial->name !!}
            @endif
          </td>
          <td>
              {!! Html::image(asset(config('settings.theme')) . '/images/testimonials/' . $testimonial->image->path) !!}
          </td>
          <td>{!! $testimonial->body !!}</td>
          <td class="pull-right">
            <div class="col-md-5">
              {!! Html::linkRoute('testimonials.edit', $buttons['edit'], ['testimonial' => $testimonial->id], ['class' => 'btn btn-info']) !!}  
            </div>
            <div class="col-md-3">
              {!! Form::open([
                    'method' => 'DELETE',
                    'route' => ['testimonials.destroy', $testimonial->id]
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