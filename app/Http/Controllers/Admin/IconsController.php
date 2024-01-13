<?php

namespace App\Http\Controllers\Admin;

use App\Models\Icon;
use App\Repositories\IconsRepository;
use App\Http\Requests\IconRequest;

class IconsController extends AdminController
{
    protected $i_rep;

    public function __construct(IconsRepository $i_rep) {
        parent::__construct();
        
        $this->i_rep = $i_rep;

        $this->buttons = $this->i_rep->getButtons();

        $this->page = 'icons';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!$this->user->can('view social')) {
            abort(403);
        }

        $this->title .= ' - Social icons';

        $icons = $this->i_rep->getFields($this->page, null, null, null, ['order', 'asc']);        
        
        $columnsTable = $this->i_rep->getColumnsHeaderTable($this->page);

        $this->content = view($this->theme. 'icons.all')
                        ->with('buttons', $this->buttons)
                        ->with('icons', $icons)
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
        if(!$this->user->can('create social')) {
            abort(403);
        }

        $this->title .= ' - Add new social icon';

        $fields = $this->i_rep->getFormFields($this->page);

        $this->content = view($this->theme . 'icons.add')
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
    public function store(IconRequest $request)
    {
        if(!$this->user->can('create social')) {
            abort(403);
        }

        $result = $this->i_rep->addIcon($request);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/icons')->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Icon  $icon
     * @return \Illuminate\Http\Response
     */
    public function show(Icon $icon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Icon  $icon
     * @return \Illuminate\Http\Response
     */
    public function edit(Icon $icon)
    {
        if(!$this->user->can('edit social')) {
            abort(403);
        }

        $this->title .= ' - Edit social icon';

        $fields = $this->i_rep->getFormFields($this->page);

        $this->content = view($this->theme . 'icons.edit')
                        ->with('buttons', $this->buttons)
                        ->with('fields', $fields)
                        ->with('icon', $icon);

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Icon  $icon
     * @return \Illuminate\Http\Response
     */
    public function update(IconRequest $request, Icon $icon)
    {
        if(!$this->user->can('edit social')) {
            abort(403);
        }

        $result = $this->i_rep->updateIcon($request, $icon);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/icons')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Icon  $icon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Icon $icon)
    {
        if(!$this->user->can('delete social')) {
            abort(403);
        }

        $result = $this->i_rep->deleteIcon($icon);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/icons')->with($result);
    }
}
