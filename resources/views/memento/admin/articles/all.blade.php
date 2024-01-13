
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
  
@if(!empty($articles))
  <div class="box-body table-responsive no-padding">
    <table class="table table-hover">
      <tr>
        @foreach($columnsTable as $column)
          <th>{{ $column }}</th>
        @endforeach
        <th></th>
      </tr>
      
      @foreach($articles as $key => $article)
        <tr>
          <td>{{ $firstItem + $key  }}</td>
          <td>{!! $article->title !!}</td>
          <td>{{ $article->category->title }}</td>
          <td>
            @if(isset($article->image->min))
              {!! Html::image(asset(config('settings.theme')) . '/images/articles/' . $article->image->min) !!}
            @endif
          </td>
          <td>{{ $article->published }}</td>
          <td class="pull-right">
            <div class="col-md-5">
              {!! Html::linkRoute('articles.edit', $buttons['edit'], ['article' => $article->id], ['class' => 'btn btn-info']) !!}  
            </div>
            <div class="col-md-3">
              {!! Form::open([
                    'method' => 'DELETE',
                    'route' => ['articles.destroy', $article->id]
                        ]) 
              !!}
              {!! Form::submit($buttons['delete'], ['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}
            </div>
          </td>
        </tr>
      @endforeach
    </table>
  </div><!-- /.box-body -->

    @include(config('settings.theme') . '.admin.parts.pagination') 
    
@endif