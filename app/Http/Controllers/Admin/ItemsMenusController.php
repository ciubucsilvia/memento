<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\MenusRepository;
use App\Http\Requests\ItemMenuRequest;
use App\Models\Menu;
use App\Models\ItemsMenu;

class ItemsMenusController extends AdminController
{
    protected $menus;

    public function __construct(MenusRepository $menus) {
        parent::__construct();

        $this->menus = $menus;

        $this->buttons = $this->menus->getButtons();

        $this->page = 'menus-item';
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Menu $menu) {
        
        if(!$this->user->can('create item_menu')) {
            abort(403);
        }

        $this->title .= ' - Add new item menu';

        $fields = $this->menus->getFormFields($this->page);
        
        $parents = $this->menus->getMenus($menu);

        if($parents){
            $parents = $parents->roots();
            $parents = $this->menus->getMenuItems($parents);
        } else {
            $parents = ['0' => 'Parent item menu'];
        }

        $this->content = view($this->theme . 'menus.item_add')
                        ->with('buttons', $this->buttons)
                        ->with('fields', $fields)
                        ->with('parents', $parents)
                        ->with('menu', $menu);

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemMenuRequest $request)
    {
        if(!$this->user->can('create item_menu')) {
            abort(403);
        }

        $result = $this->menus->addItemMenu($request);

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
    public function show(ItemsMenu $itemMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$this->user->can('edit item_menu')) {
            abort(403);
        }

        $this->title .= ' - Edit item menu';

        $itemMenu = ItemsMenu::find($id);
        
        $fields = $this->menus->getFormFields($this->page);
        
        $parents = $this->menus->getMenus($itemMenu->menu);
        if($parents){
            $parents = $parents->roots();
            $parents = $this->menus->getMenuItems($parents);
        } else {
            $parents = ['0' => 'Parent item menu'];
        }
        
        $this->content = view($this->theme . 'menus.item_edit')
                        ->with('buttons', $this->buttons)
                        ->with('fields', $fields)
                        ->with('parents', $parents)
                        ->with('itemMenu', $itemMenu);

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemMenuRequest $request, $id)
    {
        if(!$this->user->can('edit item_menu')) {
            abort(403);
        }

        $result = $this->menus->editItemMenu($request, $id);

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
    public function destroy($id)
    {
        if(!$this->user->can('delete item_menu')) {
            abort(403);
        }

        $result = $this->menus->deleteItemMenu($id);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/menus')->with($result);   
    }
}