<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\MenusRepository;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;

class MenusController extends AdminController
{
    protected $menus;
    public function __construct(MenusRepository $menus) {
        parent::__construct();

        $this->menus = $menus;
    
        $this->buttons = $this->menus->getButtons();

        $this->page = 'menus';
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!$this->user->can('view menus')) {
            abort(403);
        }

        $this->title .= ' - Menus';

        $menus = $this->menus->getFields($this->page);        
        if($menus){
            foreach($menus as $menu) {
                $menu->items = $this->menus->getMenus($menu); 
            }
        }

        $columnsTable = $this->menus->getColumnsHeaderTable($this->page);

        $this->content = view($this->theme. 'menus.all')
                        ->with('buttons', $this->buttons)
                        ->with('menus', $menus)
                        ->with('page', $this->page)
                        ->with('columnsTable', $columnsTable);

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!$this->user->can('create menu')) {
            abort(403);
        }

        $this->title .= ' - Add new menu';

        $fields = $this->menus->getFormFields($this->page);

        $this->content = view($this->theme . 'menus.add')
                        ->with('buttons', $this->buttons)
                        ->with('fields', $fields);

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
        if(!$this->user->can('create menu')) {
            abort(403);
        }

        $result = $this->menus->addMenu($request);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/menus')->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        if(!$this->user->can('edit menu')) {
            abort(403);
        }

        $this->title .= ' - Edit menu';

        $fields = $this->menus->getFormFields($this->page);

        $this->content = view($this->theme . 'menus.edit')
                        ->with('buttons', $this->buttons)
                        ->with('fields', $fields)
                        ->with('menu', $menu);

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        if(!$this->user->can('edit menu')) {
            abort(403);
        }

        $result = $this->menus->editMenu($request, $menu);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/menus')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        if(!$this->user->can('delete menu')) {
            abort(403);
        }

        $result = $this->menus->deleteMenu($menu);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/menus')->with($result);   
    }
}
