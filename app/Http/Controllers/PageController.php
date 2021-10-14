<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\User;

class PageController extends Controller
{
    public function index(){
        return view("welcome");
    }

    public function admin_index(){
        return view("admin.index");
    }



}
