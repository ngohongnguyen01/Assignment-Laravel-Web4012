<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('can:list-admin',['only'=>['index']]);
    }

    public function index(){
        return view('backend.index');
    }
}
