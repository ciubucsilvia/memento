    @if($items->isNotEmpty())
    @foreach($items as $item)
    
    <tr>
      <td>
          {!! $paddingLeft !!} 
          {{ $item->title }}
      </td>
      <td>{!! $item->url() !!}</td>
      <td class="pull-right">
        <div class="col-md-5">
          <a href="{{ route('menus-item.edit', $item->id) }}" class= 'btn btn-info'>{{$buttons['edit']}}</a>
        </div>
        <div class="col-md-3">
          {!! Form::open([
                'method' => 'DELETE',
                'route' => ['menus-item.destroy', $item->id]
                    ]) 
          !!}
          {!! Form::submit($buttons['delete'], ['class' => 'btn btn-danger']) !!}
          {!! Form::close() !!}
        </div>
      </td>
    </tr>
    @if($item->hasChildren())
      @include(config('settings.theme') . '.admin.menus.item_rows', ['items' => $item->children(), 'paddingLeft' => $paddingLeft . '&nbsp;-&nbsp;'])
    @endif
    
  @endforeach
  @endif