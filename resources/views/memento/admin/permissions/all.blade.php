
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
  @if(!empty($permissions))
  <div class="box-body table-responsive no-padding">
    <table class="table table-hover">
      <tr>
        @foreach($columnsTable as $column)
          <th>{{ $column }}</th>
        @endforeach
        <th></th>
      </tr>
      
      @foreach($permissions as $key => $permission)
        <tr>
          <td>{{ $firstItem + $key  }}</td>
          <td>{{ $permission->name }}</td>
          {{-- <td>{{ $permission->display_name }}</td>
          <td>{{ $permission->description }}</td> --}}
          <td class="pull-right">
            <div class="col-md-3">
              {!! Html::linkRoute('permissions.edit', $buttons['edit'], ['permission' => $permission->id], ['class' => 'btn btn-info']) !!}  
            </div>
          </td>
        </tr>
      @endforeach
    </table>
  </div><!-- /.box-body -->

    @include(config('settings.theme') . '.admin.parts.pagination') 
    
@endif

