<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\FaqsRepository;
use App\Http\Requests\FaqRequest;
use App\Models\Faq;


class FaqsController extends AdminController
{
    protected $faqs;

    public function __construct(FaqsRepository $faqs) {
        parent::__construct();

        $this->faqs = $faqs;
        
        $this->buttons = $this->faqs->getButtons();

        $this->page = 'faqs';
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!$this->user->can('view faqs')) {
            abort(403);
        }

        $this->title .= ' - All faqs';

        $faqs = $this->faqs->getFields($this->page);        

        $columnsTable = $this->faqs->getColumnsHeaderTable($this->page);

        $this->content = view($this->theme . 'faqs.all')
                        ->with('buttons', $this->buttons)
                        ->with('faqs', $faqs)
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
        if(!$this->user->can('create faq')) {
            abort(403);
        }

        $this->title.= ' - Create new Faq';

        $fields = $this->faqs->getFormFields($this->page);

        $faqs = $this->faqs->getReduceSelectFields();

        $this->content = view($this->theme . 'faqs.add')
                        ->with('buttons', $this->buttons)
                        ->with('fields', $fields)
                        ->with('faqs', $faqs);

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqRequest $request)
    {
        if(!$this->user->can('create faq')) {
            abort(403);
        }

        $result = $this->faqs->addFaq($request);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/faqs')->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        if(!$this->user->can('edit faq')) {
            abort(403);
        }

        $this->title.= ' - Edit Faq';

        $fields = $this->faqs->getFormFields($this->page);

        $this->content = view($this->theme . 'faqs.edit')
                        ->with('buttons', $this->buttons)
                        ->with('fields', $fields)
                        ->with('faq', $faq);

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FaqRequest $request, Faq $faq)
    {
        if(!$this->user->can('edit faq')) {
            abort(403);
        }

        $result = $this->faqs->updateFaq($request, $faq);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/faqs')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        if(!$this->user->can('delete faq')) {
            abort(403);
        }

        $result = $this->faqs->deleteFaq($faq);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/faqs')->with($result);
    }
}
