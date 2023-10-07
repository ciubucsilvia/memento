<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Repositories\ArticlesRepository;
use Lang;

class ArticlesController extends BaseController
{
    public function __construct() {
        parent::__construct(new \App\Repositories\MenusRepository(new \App\Menu), new \App\Repositories\ArticlesRepository(new \App\Article), new \App\Repositories\IconsRepository(new \App\Icon));

        $this->bar = 'right';

        $this->template = $this->theme . '.articles';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->title = "Blog";

        $articles = $this->a_rep->getArticles($this->config['paginate_articles']);
        
        $this->content = view($this->theme . '.articlesContent')
                            ->with('articles', $articles)
                            ->with('posts', $articles);

        $this->getContentRightBar();

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
        $article = $this->a_rep->one($alias);

        if($article) {
            $this->title = $article->title;
            $this->keywords = $article->keywords;
            $this->meta_desc = $article->meta_desc;

            $article->image = json_decode($article->image);

            $field_comment = Lang::get('site.article')['fields_comment'];

            $this->content = view($this->theme . '.articleShowContent')
                                ->with('article', $article)
                                ->with('field_comment', $field_comment);
        }

        $this->getContentRightBar();

        // dd($article->comments());

        return $this->renderOutput();
    }

    protected function getContentRightBar() {
        $last_articles = $this->a_rep->getLast(['title', 'image', 'created_at', 'alias'], $this->config['blog_last_article'], ['created_at', 'desc'], true);

        $this->contentRightBar = view($this->theme . '.articlesBar')
                                ->with('articles', $last_articles);
    }
}
