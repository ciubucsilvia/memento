
  <div class="box-header">
    <div class="row">
      <div class="col-xs-1">
        <a href="{{ route($page . '.create') }}" title="" class="btn btn-block btn-success btn-xs">{{ $buttons['create'] }}</a>
      </div>
    </div>
      
  </div><!-- /.box-header -->
@if(!empty($faqs))
  <div class="box-body table-responsive no-padding">

   

    <table class="table table-hover table-sorting">
      <tr>
        @foreach($columnsTable as $column)
          <th>{{ $column }}</th>
        @endforeach
        <th></th>
        <th></th>
      </tr>
      <tbody>
      @foreach($faqs as $key => $faq)
        <tr id="{{ $faq->id }}">
          <td>
            {{ $key + 1 }}
          </td>
          <td>{!! $faq->question !!}</td>
          <td>{!! $faq->answer !!}</td>
          <td>{!! $faq->published !!}</td>
          <td class="pull-right">
            <div class="col-md-5">
              {!! Html::linkRoute('faqs.edit', $buttons['edit'], ['faq' => $faq->id], ['class' => 'btn btn-info']) !!}  
            </div>
            <div class="col-md-3">
              {!! Form::open([
                    'method' => 'DELETE',
                    'route' => ['faqs.destroy', $faq->id]
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