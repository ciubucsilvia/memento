<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class OrderController extends Controller
{
    public function order(Request $request) {
        
        $table = $request->input('table');

        $sorting = $request->input('sorting');

        foreach($sorting as $k => $val) {
            DB::table($table)->where('id', $val)->update(['order' => ($k + 1)]);
        }        
    }
}
