<div id="nav" class="group">
    <ul id="menu-main-nav" class="level-1">

        @foreach($menu->roots() as $item)
            <li {{ (URL::current() == $item->url()) ? "class=active" : '' }}>
                <a href="{{ $item->url() }}">{{ $item->title }}</a>
                @if($item->hasChildren())
                     <ul class="sub-menu">
                     @include(env('THEME') . '.site.parts.customMenuItems', ['items'=>$item->children()])
                     </ul>
                @endif
            </li>
        @endforeach
       
    </ul>
</div>