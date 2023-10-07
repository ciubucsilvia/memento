<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MenusRepository;
use App\Repositories\ArticlesRepository;
use App\Repositories\IconsRepository;
use Menu;
use Lang;

class BaseController extends Controller
{
	protected $m_rep;
    protected $a_rep;
    protected $i_rep;

	protected $keywords;
	protected $meta_desc;
	protected $title;

	protected $theme;
	protected $vars = [];
	protected $template;
    protected $config;

    protected $content;
	protected $contentRightBar = false;
	protected $contentLeftBar = false;
	protected $bar = 'no';
    protected $sideBar = false;
    protected $pageTitle = false;

    public function __construct(MenusRepository $m_rep, ArticlesRepository $a_rep, IconsRepository $i_rep) {
		
        $this->m_rep = $m_rep;
        $this->a_rep = $a_rep;
        $this->i_rep = $i_rep;

		$this->theme = config('settings.theme') . '.site';
        $this->config = config('settings.site');
	}

    public function renderOutput() {
    	$this->vars = array_add($this->vars, 'keywords', $this->keywords);
        $this->vars = array_add($this->vars, 'meta_desc', $this->meta_desc);
        $this->vars = array_add($this->vars, 'title', $this->title);

        // START Header
        $logo = view($this->theme . '.parts.logo')->render();
        $this->vars = array_add($this->vars, 'logo', $logo);
        
    	$menuTop = $this->getMenu(2);
    	$navigation = view($this->theme . '.parts.navigation')
                        ->with('menu', $menuTop);
    	$this->vars = array_add($this->vars, 'navigation', $navigation);
        // END Header

        // TITLE
        if($this->pageTitle){
            $this->pageTitle = view($this->theme . '.parts.pageTitle')->with('title', $this->title);
        }
        $this->vars = array_add($this->vars, 'pageTitle', $this->pageTitle);
        
        // Content
        $this->vars = array_add($this->vars, 'content', $this->content);
        $this->vars = array_add($this->vars, 'bar', $this->bar);
        
        // START Sidebar
    	if($this->contentRightBar) {
    		$this->sideBar = view($this->theme . '.parts.rightBar')
                                ->with('content_rightBar', $this->contentRightBar);
    	}

    	if($this->contentLeftBar) {
            $this->sideBar = view($this->theme . '.parts.leftBar')
                                ->with('content_leftBar', $this->contentLeftBar);   
    	}

        $this->vars = array_add($this->vars, 'sideBar', $this->sideBar);
        // END Sidebar

        // START footer
        $last_articles = $this->a_rep->getLast(['title', 'created_at', 'alias'], $this->config['footer_last_article'], ['created_at', 'desc'], true);
        
        $menuBottom = $this->getMenu(3);

        $icons = $this->i_rep->getLast('*', null, ['order', 'asc'], false);

        $footer = view($this->theme . '.parts.footer')
                    ->with('menuBottom', $menuBottom)
                    ->with('articles', $last_articles)
                    ->with('icons', $icons);

    	$this->vars = array_add($this->vars, 'footer', $footer);
    	// END footer

        return view($this->template)->with($this->vars);
    }

    private function getMenu($id) {
        $menu = $this->m_rep->getMenuWithItems($id);
        
        return Menu::make('MyNav' . $id, function($m) use ($menu) {
            foreach($menu as $item) {
                if($item->parent == 0) {
                    $m->add($item->title, $item->path)->id($item->id);
                } else {
                    if($m->find($item->parent)) {
                        $m->find($item->parent)->add($item->title, $item->path)->id($item->id);
                    }
                }
            }
        });
    }
}
