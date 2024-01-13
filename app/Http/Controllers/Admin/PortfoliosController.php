<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\PortfoliosRepository;
use App\Repositories\CategoriesRepository;
use App\Http\Requests\PortfolioRequest;
use App\Models\Portfolio;

class PortfoliosController extends AdminController
{
    protected $portfolios;

    public function __construct(PortfoliosRepository $portfolios, CategoriesRepository $categories) {
        parent::__construct();

        $this->portfolios = $portfolios;
        $this->categories = $categories;

        $this->buttons = $this->portfolios->getButtons();

        $this->page = 'portfolios';
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!$this->user->can('view portfolios')) {
            abort(403);
        }

        $this->title .= ' - All portfolios';

        $this->content = $this->getPortfolios();

        return $this->renderOutput();
    }

        public function getPortfolios() {

        $record = $this->portfolios->getRecord();

        $search = $this->portfolios->getSearch();

        $portfolios = $this->portfolios->getFields($this->page, 'title', $record, $search);
        
        if($portfolios){
            $this->paginate = $this->portfolios->getPagination(
                                    $portfolios->firstItem(),
                                    $portfolios->lastItem(),
                                    $portfolios->total()
                                );
            $this->links = $portfolios->links();
            $this->firstItem = $portfolios->firstItem();
        };

        $records = $this->portfolios->createNrRecords();

        $columnsTable = $this->portfolios->getColumnsHeaderTable($this->page);

        $this->content = view($this->theme. 'portfolios.all')
                        ->with('buttons', $this->buttons)
                        ->with('paginate', $this->paginate)
                        ->with('pagination', $this->links)
                        ->with('portfolios', $portfolios)
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
        if(!$this->user->can('create portfolio')) {
            abort(403);
        }

        $this->title.= ' - Create new Portfolio';

        $fields = $this->portfolios->getFormFields($this->page);

        $categories = $this->categories->getReduceSelectFields(['type', 'portfolio']);

        if(!$categories) {
            $categories = [];
        }

        $this->content = view($this->theme . 'portfolios.add')
                        ->with('buttons', $this->buttons)
                        ->with('fields', $fields)
                        ->with('categories', $categories);

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioRequest $request)
    {
        if(!$this->user->can('create portfolio')) {
            abort(403);
        }

        $result = $this->portfolios->addPortfolio($request);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/portfolios')->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        if(!$this->user->can('edit portfolio')) {
            abort(403);
        }

        $this->title.= ' - Edit Portfolio';

        $portfolio->image = json_decode($portfolio->image);

        $fields = $this->portfolios->getFormFields($this->page);;
        
        $categories = $this->categories->getReduceSelectFields(['type', 'portfolio']);

        $this->content = view($this->theme . 'portfolios.edit')
                        ->with('buttons', $this->buttons)
                        ->with('fields', $fields)
                        ->with('portfolio', $portfolio)
                        ->with('categories', $categories);

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PortfolioRequest $request, Portfolio $portfolio)
    {
        if(!$this->user->can('edit portfolio')) {
            abort(403);
        }

        $result = $this->portfolios->updatePortfolio($request, $portfolio);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/portfolios')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        if(!$this->user->can('delete portfolio')) {
            abort(403);
        }

        $result = $this->portfolios->deletePortfolio($portfolio);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/portfolios')->with($result);
    }
}
