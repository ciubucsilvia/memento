@if($projects)
    <div class="inner home-portfolio home-services home-section group">
        <h2>{!! Lang::get('site.index')['index_projects'] !!}</h2>
        @foreach($projects as $k => $project)
            <div class="hentry-post group {{ ($k == 0 ? 'first' : $k == 3) ? 'last' : '' }}">
                @if($project->image->path_index)
                    <div class="thumb-img"><a href="{{ route('portfolioShow', ['alias' => $project->alias]) }}" title="{{ $project->title }}" class="title"><img width="208" height="168" src="{{ env('THEME') }}/images/portfolios/{{ $project->image->path_index }}" class="attachment-thumb_filterable wp-post-image" alt="{{ $project->title }}" title="{{ $project->title }}" /></a></div>
                @endif
                <h3><a href="{{ route('portfolioShow', ['alias' => $project->alias]) }}" title="{{ $project->title }}" class="title">{{ $project->title }}</a></h3>
                <p>{!! Str::limit($project->body, 
                    Config::get('settings.site')['project_description_in_index_page'], strlen($project->body) <= Config::get('settings.site')['project_description_in_index_page'] ? null : '...') !!}</p>
                <p><a href="{{ route('portfolioShow', ['alias' => $project->alias]) }}" class="btn btn-retro-package-3 btn-more-link"><i class="icon-list" style="font-size: 14px;"></i>   Read more</a></p>
            </div>
        @endforeach
    </div>
@endif