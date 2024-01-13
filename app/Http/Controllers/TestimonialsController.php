<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;

class TestimonialsController extends BaseController
{
    public function __construct() {
        parent::__construct(new \App\Repositories\MenusRepository(new \App\Models\Menu), new \App\Repositories\ArticlesRepository(new \App\Models\Article), new \App\Repositories\IconsRepository(new \App\Models\Icon));

        $this->template = $this->theme . '.testimonials';

        $this->pageTitle = true;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->title = 'Testimonials';

        $testimonials = Testimonial::orderBy('order')->get();

        $this->content = view($this->theme . '.contentTestimonials')
                            ->with('testimonials', $testimonials);

        return $this->renderOutput();
    }
}
