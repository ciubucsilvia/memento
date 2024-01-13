<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\ArticlesRepository;
use App\Repositories\CategoriesRepository;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;

class ArticlesController extends AdminController
{
    protected $articles;

    public function __construct(ArticlesRepository $articles, CategoriesRepository $categories) {
        parent::__construct();
        
        $this->articles = $articles;
        $this->categories = $categories;

        $this->buttons = $this->articles->getButtons();

        $this->page = 'articles';
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!$this->user->can('view articles')) {
            abort(403);
        }

        $this->title .= ' - All articles';

        $this->content = $this->getArticles();

        return $this->renderOutput();
    }

    public function getArticles() {

        $record = $this->articles->getRecord();

        $search = $this->articles->getSearch();

        $articles = $this->articles->getFields($this->page, 'title', $record, $search);
        
        if($articles){
            $this->paginate = $this->articles->getPagination(
                                    $articles->firstItem(),
                                    $articles->lastItem(),
                                    $articles->total()
                                );
            $this->links = $articles->links();
            $this->firstItem = $articles->firstItem();
        };

        $records = $this->articles->createNrRecords();

        $columnsTable = $this->articles->getColumnsHeaderTable($this->page);

        $this->content = view($this->theme. 'articles.all')
                        ->with('buttons', $this->buttons)
                        ->with('paginate', $this->paginate)
                        ->with('pagination', $this->links)
                        ->with('articles', $articles)
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
        if(!$this->user->can('create article')) {
            abort(403);
        }

        $this->title.= ' - Create new Article';

        $fields = $this->articles->getFormFields($this->page);

        $categories = $this->categories->getReduceSelectFields(['type', 'article']);
        
        if(!$categories) {
            $categories = [];
        }
        
        $this->content = view($this->theme . 'articles.add')
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
    public function store(ArticleRequest $request)
    {
        if(!$this->user->can('create article')) {
            abort(403);
        }

        $result = $this->articles->addArticle($request);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/articles')->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        if(!$this->user->can('edit article')) {
            abort(403);
        }

        $this->title.= ' - Edit Article';

        $article->image = json_decode($article->image);

        $fields = $this->articles->getFormFields($this->page);
        
        $categories = $this->categories->getReduceSelectFields(['type', 'article']);

        $this->content = view($this->theme . 'articles.edit')
                        ->with('buttons', $this->buttons)
                        ->with('fields', $fields)
                        ->with('article', $article)
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
    public function update(ArticleRequest $request, Article $article)
    {
        if(!$this->user->can('edit article')) {
            abort(403);
        }

        $result = $this->articles->updateArticle($request, $article);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/articles')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if(!$this->user->can('delete article')) {
            abort(403);
        }

        $result = $this->articles->deleteArticle($article);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/articles')->with($result);
    }
}
