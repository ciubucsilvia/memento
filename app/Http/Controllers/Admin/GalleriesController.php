<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\GalleriesRepository;
use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;

class GalleriesController extends AdminController
{
    protected $galleries;

    public function __construct(GalleriesRepository $galleries) {
        parent::__construct();

        $this->galleries = $galleries;

        $this->buttons = $this->galleries->getButtons();

        $this->page = 'gallery';
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if(!$this->user->can('view galleries')) {
            abort(403);
        }

        $this->title.= ' - Gallery';

        $this->content = $this->getGallery();

        return $this->renderOutput();
    }

    public function getGallery() {

        $record = $this->galleries->getRecord();

        $search = $this->galleries->getSearch();
        
        $galleries = $this->galleries->getFields($this->page, 'title', $record, $search);

        if($galleries) {
                $this->paginate = $this->galleries->getPagination(
                                        $galleries->firstItem(),
                                        $galleries->lastItem(),
                                        $galleries->total()
                                    );
                $this->links = $galleries->links();
                $this->firstItem = $galleries->firstItem();
            }

        $records = $this->galleries->createNrRecords();

        $columnsTable = $this->galleries->getColumnsHeaderTable($this->page);

        $this->content = view($this->theme. 'galleries.all')
                        ->with('buttons', $this->buttons)
                        ->with('paginate', $this->paginate)
                        ->with('pagination', $this->links)
                        ->with('galleries', $galleries)
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
        if(!$this->user->can('create gallery')) {
            abort(403);
        }

        $this->title .= ' - Add new Image to Gallery';

        $fields = $this->galleries->getFormFields($this->page);

        $this->content = view($this->theme . 'galleries.add')
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
    public function store(GalleryRequest $request)
    {
        if(!$this->user->can('create gallery')) {
            abort(403);
        }

        $result = $this->galleries->addImagetoGallery($request);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/gallery')->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        if(!$this->user->can('edit gallery')) {
            abort(403);
        }

        $this->title .= ' - Edit Image';

        $fields = $this->galleries->getFormFields($this->page);

        $gallery->image = json_decode($gallery->image);

        $this->content = view($this->theme . 'galleries.edit')
                        ->with('buttons', $this->buttons)
                        ->with('fields', $fields)
                        ->with('gallery', $gallery);

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, Gallery $gallery)
    {
        if(!$this->user->can('edit gallery')) {
            abort(403);
        }

        $result = $this->galleries->updateImagetoGallery($request, $gallery);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/gallery')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        if(!$this->user->can('delete gallery')) {
            abort(403);
        }

        $result = $this->galleries->deleteImagetoGallery($gallery);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/gallery')->with($result);
    }
}
