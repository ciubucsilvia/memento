<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Menu;

class AdminController extends Controller
{
    protected $title;
    protected $theme;

    protected $navigation;
    protected $content;
    protected $sidebar;
    protected $alert;
    protected $footer;

    protected $user;

    protected $buttons;
    protected $paginate;
    protected $page;

    protected $recordsOnPage = true;
    protected $links = false;
    protected $firstItem = 0;

    public function __construct() {
        $this->middleware(function ($request, $next) {

            $this->user = Auth::user();

            if(!$this->user) {
                return redirect('login');
            }

            return $next($request);
        });

        $this->theme = config('settings.theme') . '.admin.';

        $this->title = 'Admin Panel';
    }

    public function renderOutput() {
    	
        $this->navigation = view($this->theme . 'parts.navigation');
    	
        $menu = $this->getMenu();

    	$this->sidebar = view($this->theme . 'parts.sidebar')
                        ->with('menu', $menu);

    	$this->alert = view($this->theme . 'parts.alert');

    	$this->footer = view($this->theme . 'parts.footer');

    	$params = [
    		'title' => $this->title,
    		'navigation' => $this->navigation,
    		'content' => $this->content,
    		'sidebar' => $this->sidebar,
    		'alert' => $this->alert,
    		'footer' => $this->footer,
    	];

    	return view($this->theme . 'index')
    		->with($params);
    }

    public function getMenu() {

        $menus = Menu::make('Sidebar', function($menu) {
            $menu->add('MAIN NAVIGATION', ['class' => 'header']);    
            
            if($this->user->can('view admin')) {
                $menu->add('Home', ['route' => 'admin.home', 'class' => 'treeview']);
            } 
            
            if($this->user->can('view categories')) {
                $menu->add('Categories', ['route' => 'categories.index', 'class' => 'treeview']);
            } 
            
            if($this->user->can('view menus')) {
                $menu->add('Menus', ['route' => 'menus.index', 'class' => 'treeview']);
            } 

            if($this->user->can('view articles')) {
                $menu->add('Articles', ['route' => 'articles.index', 'class' => 'treeview']);
            } 

            if($this->user->can('view portfolios')) {
                $menu->add('Portfolios', ['route' => 'portfolios.index', 'class' => 'treeview']);
            } 

            if($this->user->can('view sliders')) {
                $menu->add('Sliders', ['route' => 'sliders.index', 'class' => 'treeview']);
            } 

            if($this->user->can('view galleries')) {
                $menu->add('Gallery', ['route' => 'gallery.index', 'class' => 'treeview']);
            } 

            if($this->user->can('view faqs')) {
                $menu->add('Faqs', ['route' => 'faqs.index', 'class' => 'treeview']);
            } 

            if($this->user->can('view testimonials')) {
                $menu->add('Testimonials', ['route' => 'testimonials.index', 'class' => 'treeview']);
            }

            if($this->user->can('view pages')) {
                $menu->add('Pages', ['route' => 'pages.index', 'class' => 'treeview']);
            } 

            if($this->user->can('view social')) {
                $menu->add('Social icons', ['route' => 'icons.index', 'class' => 'treeview']);
            } 

            if($this->user->can('view users')) {
                $menu->add('Users', ['route' => 'users.index', 'class' => 'treeview']);
            } 

            if($this->user->can('view roles')) {
                $menu->add('Roles', ['route' => 'roles.index', 'class' => 'treeview']);
            } 

            if($this->user->can('view permissions')) {
                $menu->add('Permissions', ['route' => 'permissions.index', 'class' => 'treeview']);
            }
            
            $menu->add('', ['class' => 'treeview']);
        });
        
        return $menus;
    }
}
