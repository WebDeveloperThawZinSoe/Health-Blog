<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use app\User;

use App\Category;
use App\Post;

class PageController extends Controller
{
    public function index(){
        $categories = Category::all();
        $posts = Post::latest()->paginate(12);
        return view('welcome',[
            "categories" => $categories,
            "posts" => $posts,
        ]);
       
    }

    public function admin_index(){
        return view("admin.index");
    }

    public function detail($id){
        $categories = Category::all();
        $post = Post::find($id);
        return view("post-detail",[
            "categories" => $categories,
            "post" => $post
        ]);
    }



}
