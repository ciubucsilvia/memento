<?php

namespace App\Http\Controllers;

use App\Repositories\GalleriesRepository;

class GalleryController extends BaseController
{
    protected $g_rep;

    public function __construct(GalleriesRepository $g_rep) {
        parent::__construct(new \App\Repositories\MenusRepository(new \App\Models\Menu), new \App\Repositories\ArticlesRepository(new \App\Models\Article), new \App\Repositories\IconsRepository(new \App\Models\Icon));

        $this->g_rep = $g_rep;

        $this->template = $this->theme . '.gallery';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = $this->g_rep->getLast();

        $this->content = view($this->theme . '.galleryContent')
                            ->with('gallery', $gallery);

        return $this->renderOutput();
    }
}
