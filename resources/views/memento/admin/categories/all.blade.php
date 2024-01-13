
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
@if($categories->isNotEmpty())
  <div class="box-body table-responsive no-padding">
    <table class="table table-hover">
      <tr>
        @foreach($columnsTable as $column)
          <th>{{ $column }}</th>
        @endforeach
        <th></th>
      </tr>
      @foreach($categories as $key => $category)
      <tr>
        <td>{{ $categories->firstItem() + $key }}</td>
        <td>{{ $category->title }}</td>
        <td>{{ $category->alias }}</td>
        <td>{{ $category->type }}</td>
        <td class="pull-right">
          <div class="col-md-5">
            {!! Html::linkRoute('categories.edit', $buttons['edit'], ['category' => $category->id], ['class' => 'btn btn-info']) !!}  
          </div>
          <div class="col-md-3">
            {!! Form::open([
                  'method' => 'DELETE',
                  'route' => ['categories.destroy', $category->id]
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