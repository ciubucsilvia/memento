<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\UsersRepository;
use App\Repositories\RolesRepository;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UsersController extends AdminController
{
    protected $users;
    protected $roles;

    public function __construct(UsersRepository $users, RolesRepository $roles) {
        parent::__construct();

        $this->users = $users;
        $this->roles = $roles;

        $this->buttons = $this->users->getButtons();

        $this->page = 'users';
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!$this->user->can('view users')) {
            abort(403);
        }

        $this->title.= ' - All users';

        $this->content = $this->getUsers();

        return $this->renderOutput();
    }

    public function getUsers() {

        $record = $this->users->getRecord();

        $search = $this->users->getSearch();

        $users = $this->users->getFields($this->page, 'name', $record, $search);

        if($users) {
            $this->paginate = $this->users->getPagination(
                                    $users->firstItem(),
                                    $users->lastItem(),
                                    $users->total()
                                );
            $this->links = $users->links();
            $this->firstItem = $users->firstItem();
        }
        $records = $this->users->createNrRecords();

        $columnsTable = $this->users->getColumnsHeaderTable($this->page);

        $this->content = view($this->theme. 'users.all')
                        ->with('buttons', $this->buttons)
                        ->with('paginate', $this->paginate)
                        ->with('pagination', $this->links)
                        ->with('users', $users)
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
        if(!$this->user->can('create user')) {
            abort(403);
        }

        $this->title.= ' - Create new user';

        $fields = $this->users->getFormFields($this->page);

        $roles = $this->roles->getReduceSelectFields();
        
        $this->content = view($this->theme . 'users.add')
                        ->with('buttons', $this->buttons)
                        ->with('fields', $fields)
                        ->with('roles', $roles);

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if(!$this->user->can('create user')) {
            abort(403);
        }

        $result = $this->users->addUser($request);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/users')->with($result);
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
    public function edit(User $user)
    {
        if(!$this->user->can('edit user')) {
            abort(403);
        }

        $this->title.= ' - Edit User';

        $fields = $this->users->getFormFields($this->page);

        $roles = $this->roles->getReduceSelectFields();

        $this->content = view($this->theme . 'users.edit')
                    ->with('user', $user)
                    ->with('buttons', $this->buttons)
                    ->with('fields', $fields)
                    ->with('roles', $roles);

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        if(!$this->user->can('edit user')) {
            abort(403);
        }

        $result = $this->users->updateUser($request, $user);

        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }

        return redirect('admin/users')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(!$this->user->can('delete user')) {
            abort(403);
        }

         $result = $this->users->deleteUsers($user);

         if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
         }

         return redirect('admin/users')->with($result);
    }

    protected function getRoles() {
        return false;
    }
}
