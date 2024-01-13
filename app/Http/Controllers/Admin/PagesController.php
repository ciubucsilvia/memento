<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\PagesRepository;
use App\Http\Requests\PageRequest;
use App\Models\Page;

class PagesController extends AdminController
{
     public function __construct(PagesRepository $pages) {
        parent::__construct();

        $this->pages = $pages;

        $this->buttons = $this->pages->getButtons();

        $this->page = 'pages';
     }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!$this->user->can('view pages')) {
            abort(403);
        }

        $this->title.= ' - All pages';

        $this->content = $this->getPages();

        return $this->renderOutput();
    }

    public function getPages() {

        $record = $this->pages->getRecord();

        $search = $this->pages->getSearch();

        $pages = $this->pages->getFields($this->page, 'title', $record, $search);
        
        if($pages){
            $this->paginate = $this->pages->getPagination(
                                    $pages->firstItem(),
                                    $pages->lastItem(),
                                    $pages->total()
                                );
            $this->links = $pages->links();
            $this->firstItem = $pages->firstItem();
        };

        $records = $this->pages->createNrRecords();

        $columnsTable = $this->pages->getColumnsHeaderTable($this->page);

        $this->content = view($this->theme. 'pages.all')
                        ->with('buttons', $this->buttons)
                        ->with('paginate', $this->paginate)
                        ->with('pagination', $this->links)
                        ->with('pages', $pages)
                        ->with('records', $records)
                        ->with('record', $record)
                        ->with('page', $this->page)
                        ->with('columnsTable', $columnsTable)
                        ->with('recordsOnPage', $this->recordsOnPage)
                        ->with('firstItem', $this->firstItem);

        return $this->content;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!$this->user->can('create page')) {
            abort(403);
        }

        $this->title.= ' - Create new Page';

        $fields = $this->pages->getFormFields($this->page);

        $this->content = view($this->theme . 'pages.add')
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
    public function store(PageRequest $request)
    {
        if(!$this->user->can('create page')) {
            abort(403);
        }

        $result = $this->pages->addPage($request);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/pages')->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        if(!$this->user->can('edit page')) {
            abort(403);
        }

        $this->title.= ' - Create new Page';

        $fields = $this->pages->getFormFields($this->page);

        $this->content = view($this->theme . 'pages.edit')
                        ->with('buttons', $this->buttons)
                        ->with('fields', $fields)
                        ->with('page', $page);

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, Page $page)
    {
        if(!$this->user->can('edit page')) {
            abort(403);
        }

        $result = $this->pages->updatePage($request, $page);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/pages')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        if(!$this->user->can('delete page')) {
            abort(403);
        }

        $result = $this->pages->deletePage($page);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/pages')->with($result);
    }
}
