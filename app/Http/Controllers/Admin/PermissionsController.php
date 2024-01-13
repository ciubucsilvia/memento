<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\PermissionsRepository;
use App\Http\Requests\PermissionRequest;
use Spatie\Permission\Models\Permission;

class PermissionsController extends AdminController
{
     protected $permissions;

     public function __construct(PermissionsRepository $permissions) {
        parent::__construct();

        $this->permissions = $permissions;

        $this->buttons = $this->permissions->getButtons();

        $this->page = 'permissions';
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(!$this->user->can('view permissions')) {
        //     abort(403);
        // }

        $this->title.= ' - All permissions';

        $this->content = $this->getPermissions();

        return $this->renderOutput();
    }

    public function getPermissions() {

        if(!$this->user->can('view permissions')) {
            abort(403);
        }

        $record = $this->permissions->getRecord();

        $search = $this->permissions->getSearch();

        $permissions = $this->permissions->getFields($this->page, 'display_name', $record, $search);

        if($permissions) {
                $this->paginate = $this->permissions->getPagination(
                                        $permissions->firstItem(),
                                        $permissions->lastItem(),
                                        $permissions->total()
                                    );
                $this->links = $permissions->links();
                $this->firstItem = $permissions->firstItem();
            }

        $records = $this->permissions->createNrRecords();

        $columnsTable = $this->permissions->getColumnsHeaderTable($this->page);

        $this->content = view($this->theme. 'permissions.all')
                        ->with('buttons', $this->buttons)
                        ->with('paginate', $this->paginate)
                        ->with('pagination', $this->links)
                        ->with('permissions', $permissions)
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
        if(!$this->user->can('create permission')) {
            abort(403);
        }

        $this->title.= ' - Create new Permission';

        $fields = $this->permissions->getFormFields($this->page);

        $this->content = view($this->theme . 'permissions.add')
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
    public function store(PermissionRequest $request)
    {
        if(!$this->user->can('create permission')) {
            abort(403);
        }

        $result = $this->permissions->addPermision($request);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/permissions')->with($result);
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
    public function edit(Permission $permission)
    {
        if(!$this->user->can('edit permission')) {
            abort(403);
        }

        $this->title.= ' - Edit Permission';

        $fields = $this->permissions->getFormFields($this->page);

        $this->content = view($this->theme . 'permissions.edit')
                    ->with('permission', $permission)
                    ->with('buttons', $this->buttons)
                    ->with('fields', $fields);

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        if(!$this->user->can('edit permission')) {
            abort(403);
        }
        
        $result = $this->permissions->updatePermissions($request, $permission);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/permissions')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        // 
    }
}
