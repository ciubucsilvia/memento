<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\CategoriesRepository;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;


class CategoriesController extends AdminController
{
    protected $categories;

    public function __construct(CategoriesRepository $categories) {
        parent::__construct();

        $this->categories = $categories;

        $this->buttons = $this->categories->getButtons();

        $this->page = 'categories';
     }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!$this->user->can('view categories')) {
            abort(403);
        }

        $this->title.= ' - All categories';

        $this->content = $this->getCategories();

        return $this->renderOutput();
    }

    public function getCategories() {

        $record = $this->categories->getRecord();

        $search = $this->categories->getSearch();

        $categories = $this->categories->getFields($this->page, 'title', $record, $search);
        
        if($categories){
            $this->paginate = $this->categories->getPagination(
                                    $categories->firstItem(),
                                    $categories->lastItem(),
                                    $categories->total()
                                );
            $this->links = $categories->links();
            $this->firstItem = $categories->firstItem();
        };

        $records = $this->categories->createNrRecords();

        $columnsTable = $this->categories->getColumnsHeaderTable($this->page);
        
        $this->content = view($this->theme. 'categories.all')
                        ->with('buttons', $this->buttons)
                        ->with('paginate', $this->paginate)
                        ->with('pagination', $this->links)
                        ->with('categories', $categories)
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
        if(!$this->user->can('create category')) {
            abort(403);
        }

        $this->title.= ' - Create new Category';

        $fields = $this->categories->getFormFields($this->page);

        $types = $this->categories->getTypesCategories();

        $this->content = view($this->theme . 'categories.add')
                        ->with('buttons', $this->buttons)
                        ->with('fields', $fields)
                        ->with('types', $types);

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if(!$this->user->can('create category')) {
            abort(403);
        }

        $result = $this->categories->addCategory($request);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/categories')->with($result);   
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
    public function edit(Category $category)
    {
        if(!$this->user->can('edit category')) {
            abort(403);
        }

        $this->title.= ' - Edit Category';

        $fields = $this->categories->getFormFields($this->page);
        $types = $this->categories->getTypesCategories();

        $this->content = view($this->theme . 'categories.edit')
                        ->with('buttons', $this->buttons)
                        ->with('fields', $fields)
                        ->with('category', $category)
                        ->with('types', $types);

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        if(!$this->user->can('edit category')) {
            abort(403);
        }

        $result = $this->categories->updateCategory($request, $category);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/categories')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if(!$this->user->can('delete category')) {
            abort(403);
        }

        $result = $this->categories->deleteCategory($category);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/categories')->with($result);
    }
}
