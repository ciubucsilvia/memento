<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\SlidersRepository;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;

class SlidersController extends AdminController
{
    protected $sliders;

    public function __construct(SlidersRepository $sliders) {
        parent::__construct();

        $this->sliders = $sliders;

        $this->buttons = $this->sliders->getButtons();

        $this->page = 'sliders';
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!$this->user->can('view sliders')) {
            abort(403);
        }

        $this->title .= ' - Slider';

        $sliders = $this->sliders->getFields($this->page, null, null, null, ['order', 'asc']);        

        $columnsTable = $this->sliders->getColumnsHeaderTable($this->page);

        $this->content = view($this->theme. 'sliders.all')
                        ->with('buttons', $this->buttons)
                        ->with('sliders', $sliders)
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
        if(!$this->user->can('create slider')) {
            abort(403);
        }

        $this->title .= ' - Add new image';

        $fields = $this->sliders->getFormFields($this->page);

        $this->content = view($this->theme . 'sliders.add')
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
    public function store(SliderRequest $request)
    {
        if(!$this->user->can('create slider')) {
            abort(403);
        }

        $result = $this->sliders->addSlider($request);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/sliders')->with($result);
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
    public function edit(Slider $slider)
    {
        if(!$this->user->can('edit slider')) {
            abort(403);
        }

        $this->title .= ' - Edit image';

        $fields = $this->sliders->getFormFields($this->page);

        $slider->image = json_decode($slider->image);

        $this->content = view($this->theme . 'sliders.edit')
                        ->with('buttons', $this->buttons)
                        ->with('fields', $fields)
                        ->with('slider', $slider);

        return $this->renderOutput();   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, Slider $slider)
    {
        if(!$this->user->can('edit slider')) {
            abort(403);
        }

        $result = $this->sliders->updateSlider($request, $slider);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/sliders')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        if(!$this->user->can('delete slider')) {
            abort(403);
        }

        $result = $this->sliders->deleteSlider($slider);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/sliders')->with($result);
    }
}
