<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\RolesRepository;
use App\Repositories\PermissionsRepository;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;

class RolesController extends AdminController
{
     protected $roles;
     protected $permissions;

     public function __construct(RolesRepository $roles, PermissionsRepository $permissions) {
        parent::__construct();

        $this->roles = $roles;
        $this->permissions = $permissions;

        $this->buttons = $this->roles->getButtons();

        $this->page = 'roles';
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!$this->user->can('view roles')) {
            abort(403);
        }

        $this->title.= ' - All roles';

        $this->content = $this->getRoles();

        return $this->renderOutput();
    }

    public function getRoles() {

        $record = $this->roles->getRecord();

        $search = $this->roles->getSearch();

        $roles = $this->roles->getFields($this->page, 'display_name', $record, $search);

        if($roles) {
            $this->paginate = $this->roles->getPagination(
                                        $roles->firstItem(),
                                        $roles->lastItem(),
                                        $roles->total()
                                    );
            $this->links = $roles->links();
            $this->firstItem = $roles->firstItem();
        }
        $records = $this->roles->createNrRecords();

        $columnsTable = $this->roles->getColumnsHeaderTable($this->page);

        $this->content = view($this->theme. 'roles.all')
                        ->with('buttons', $this->buttons)
                        ->with('paginate', $this->paginate)
                        ->with('pagination', $this->links)
                        ->with('roles', $roles)
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
        if(!$this->user->can('create role')) {
            abort(403);
        }

        $this->title.= ' - Create new role';

        $fields = $this->roles->getFormFields($this->page);

        $excepts = [];
        
        $permissions = $this->permissions->getReduceFieldsCheckbox($excepts);
        
        $this->content = view($this->theme . 'roles.add')
                        ->with('buttons', $this->buttons)
                        ->with('fields', $fields)
                        ->with('permissions', $permissions);

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        if(!$this->user->can('create role')) {
            abort(403);
        }

        $result = $this->roles->addRole($request);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/roles')->with($result);
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
    public function edit(Role $role)
    {
        if(!$this->user->can('edit role')) {
            abort(403);
        }

        $this->title.= ' - Edit Role';

        $fields = $this->roles->getFormFields($this->page);

        $permissions = $this->permissions->getReduceFieldsCheckbox();

        $this->content = view($this->theme . 'roles.edit')
                    ->with('role', $role)
                    ->with('buttons', $this->buttons)
                    ->with('fields', $fields)
                    ->with('permissions', $permissions);

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        if(!$this->user->can('edit role')) {
            abort(403);
        }

        $result = $this->roles->updateRoles($request, $role);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/roles')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if(!$this->user->can('delete role')) {
            abort(403);
        }

         $result = $this->roles->deleteRoles($role);

         if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
         }

         return redirect('admin/roles')->with($result);
    }
}