<?php

namespace App\Http\Controllers;

use App\Repositories\CategoriesRepository;
use App\Repositories\PortfoliosRepository;
use Lang;

class PortfoliosController extends BaseController
{
    protected $cat_rep;
    protected $p_rep;

    public function __construct(CategoriesRepository $cat_rep, PortfoliosRepository $p_rep) {
        parent::__construct(new \App\Repositories\MenusRepository(new \App\Models\Menu), new \App\Repositories\ArticlesRepository(new \App\Models\Article), new \App\Repositories\IconsRepository(new \App\Models\Icon));

        $this->cat_rep = $cat_rep;
        $this->p_rep = $p_rep;

        $this->template = $this->theme . '.portfolios';

        $this->pageTitle = true;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->title = Lang::get('site.portfolio')['title_portfolios'];

        $categories = $this->cat_rep->getLastCategories('portfolio');
        
        $this->content = view($this->theme . '.contentPortfolios')
                            ->with('categories', $categories);

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($alias)
    {
        $category = $this->cat_rep->one($alias);
        
        if($category) {
            $this->title = $category->title;    
        }

        $portfolios = $this->p_rep->getPortfolios($category, $this->config['paginate_portfolio_per_category']);
        
        $this->content = view($this->theme . '.contentCategory')
                            ->with('portfolios', $portfolios)
                            ->with('posts', $portfolios);

        return $this->renderOutput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($alias)
    {
        $portfolio = $this->p_rep->one($alias);

        if($portfolio) {
            $this->title = $portfolio->title;
            $this->keywords = $portfolio->keywords;
            $this->meta_desc = $portfolio->meta_desc;

            $portfolio->image = json_decode($portfolio->image);
        }
        
        $this->pageTitle = false;
        $this->bar = 'right';

        $this->content = view($this->theme . '.portfolioShow')
                            ->with('portfolio', $portfolio);

        $lastProjects = $this->p_rep->getLast(['title', 'category_id', 'alias', 'image'], $this->config['last_projects_in_portfolio_page'], ['created_at', 'desc'], true);

        $this->contentRightBar = view($this->theme . '.portfoliosShowProjects')
                                    ->with('projects', $lastProjects);

        return $this->renderOutput();
    }
}
