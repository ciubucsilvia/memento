<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PagesRepository;

class PageController extends BaseController
{
    protected $p_rep;

    public function __construct(PagesRepository $p_rep) {
        parent::__construct(new \App\Repositories\MenusRepository(new \App\Models\Menu), new \App\Repositories\ArticlesRepository(new \App\Models\Article), new \App\Repositories\IconsRepository(new \App\Models\Icon));

        $this->p_rep = $p_rep;

        $this->pageTitle = true;

        $this->template = $this->theme . '.page';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($alias)
    {
        $page = $this->p_rep->one($alias);

        if($page) {
            $this->title = $page->title;
            $this->keywords = $page->keywords;
            $this->meta_desc = $page->meta_desc;

            $this->content = view($this->theme . '.contentPage')->with('content', $page->body);
        } else {
             $this->content = view(env('THEME') . '.errors.404');
        }

        return $this->renderOutput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
