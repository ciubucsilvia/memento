<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\TestimonialsRepository;
use App\Http\Requests\TestimonialRequest;
use App\Models\Testimonial;

class TestimonialsController extends AdminController
{
    protected $testimonials;

    public function __construct(TestimonialsRepository $testimonials) {
        parent::__construct();

        $this->testimonials = $testimonials;

        $this->buttons = $this->testimonials->getButtons();

        $this->page = 'testimonials';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!$this->user->can('view testimonials')) {
            abort(403);
        }

        $this->title .= ' - Testimonials';

        $testimonials = $this->testimonials->getFields($this->page);

        $columnsTable = $this->testimonials->getColumnsHeaderTable($this->page);

        $this->content = view($this->theme. 'testimonials.all')
                        ->with('buttons', $this->buttons)
                        ->with('testimonials', $testimonials)
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
        if(!$this->user->can('create testimonial')) {
            abort(403);
        }

        $this->title .= ' - Add new testimonial';

        $fields = $this->testimonials->getFormFields($this->page);

        $this->content = view($this->theme . 'testimonials.add')
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
    public function store(TestimonialRequest $request)
    {
        if(!$this->user->can('create testimonial')) {
            abort(403);
        }

        $result = $this->testimonials->addTestimonial($request);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/testimonials')->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        if(!$this->user->can('edit testimonial')) {
            abort(403);
        }

        $this->title .= ' - Edit Testimonial';

        $fields = $this->testimonials->getFormFields($this->page);

        $testimonial->image = json_decode($testimonial->image);

        $this->content = view($this->theme . 'testimonials.edit')
                        ->with('buttons', $this->buttons)
                        ->with('fields', $fields)
                        ->with('testimonial', $testimonial);

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonialRequest $request, Testimonial $testimonial)
    {
        if(!$this->user->can('edit testimonial')) {
            abort(403);
        }

        $result = $this->testimonials->updateTestimonial($request, $testimonial);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/testimonials')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        if(!$this->user->can('delete testimonial')) {
            abort(403);
        }

        $result = $this->testimonials->deleteTestimonial($testimonial);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/testimonials')->with($result);
    }
}
