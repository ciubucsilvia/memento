<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;

class FaqsController extends BaseController
{
    public function __construct() {
        parent::__construct(new \App\Repositories\MenusRepository(new \App\Menu), new \App\Repositories\ArticlesRepository(new \App\Article), new \App\Repositories\IconsRepository(new \App\Icon));

        $this->template = $this->theme . '.faqs';

        $this->pageTitle = true;

        $this->bar = 'right';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->title = 'Faqs';

        $faqs = Faq::where('published', 1)->orderBy('order')->get();

        $this->content = view($this->theme . '.contentFaqs')
                            ->with('faqs', $faqs)->render();

         $this->contentRightBar = view($this->theme . '.faqsBar');

        return $this->renderOutput();
    }
}
