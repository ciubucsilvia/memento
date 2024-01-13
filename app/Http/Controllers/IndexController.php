<?php

namespace App\Http\Controllers;

use App\Repositories\SlidersRepository;
use App\Repositories\PagesRepository;
use App\Repositories\PortfoliosRepository;
use Illuminate\Support\Arr;


class IndexController extends BaseController
{
    protected $s_rep;
    protected $p_rep;
    protected $portfolio_rep;

    public function __construct(SlidersRepository $s_rep, PagesRepository $p_rep, PortfoliosRepository $portfolio_rep) {
        parent::__construct(new \App\Repositories\MenusRepository(new \App\Models\Menu), new \App\Repositories\ArticlesRepository(new \App\Models\Article), new \App\Repositories\IconsRepository(new \App\Models\Icon));

        $this->s_rep = $s_rep;
        $this->p_rep = $p_rep;
        $this->portfolio_rep = $portfolio_rep;

        $this->template = $this->theme . '.index';
        $this->bar = 'left';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = $this->s_rep->getLast('*', null, ['order', 'asc']);

        $slider = view($this->theme . '.slider')
                    ->with('sliders', $sliders);

        $body = $this->p_rep->one('index');

        if($body){
            $this->title = $body->title;
            $this->keywords = $body->keywords;
            $this->meta_desc = $body->meta_desc;
        }

        $this->content = view($this->theme . '.contentIndex')->with('content', $body);

        $last_articles = $this->a_rep->getLast(['title', 'created_at', 'alias', 'image'], $this->config['last_articles_in_index_page'], ['created_at', 'desc'], true);

        $this->contentRightBar = view($this->theme . '.indexArticles')
                                    ->with('articles', $last_articles);
        
        $this->vars = Arr::add($this->vars, 'slider', $slider);

        $projects = $this->portfolio_rep->getLast(['title', 'image', 'body', 'alias'], $this->config['projects_in_index_page'], ['created_at', 'desc'], true);
        
        $projectsIndex = view($this->theme . '.projectsIndex')
                        ->with('projects', $projects); 

        $this->vars = Arr::add($this->vars, 'projectsIndex', $projectsIndex);
        
        return $this->renderOutput();   
    }
}
