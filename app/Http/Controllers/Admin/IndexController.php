<?php

namespace App\Http\Controllers\Admin;

class IndexController extends AdminController
{
    public function __construct() {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return $this->renderOutput();
    }
}
