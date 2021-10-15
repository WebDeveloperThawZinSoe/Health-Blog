<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function show(){
        $categories = Category::latest()->get();
        $posts = Post::latest()->paginate(10);
        return view("admin.post",[
            "categories" => $categories,
            "posts" => $posts,
        ]);
    }

    public function create(Request $request){
        $validator = validator(request()->all(),[
            'name' => ['required', 'string', 'max:255'],
            'image' => ['required|image|mimes:jpeg,png,jpg,gif,svg|max:4096'],
            'description' => ['required'],

        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        };


        $post = new Post;

        if ($request->file('file')) {
            $file = $request->file('file');
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->move('uploads/' ,  $fileName);  
            $post->name = $request->name;
            $post->categroy_id = $request->category;
            $post->description = $request->description;
            $post->image = $fileName;
            $post->save();
           
          }
          return back()->with('success', 'Post Insert successfully');  
    }

    public function delete($id){
        $user = Post::find($id);
        $user->delete();

        return redirect("/admin/post")->with('success','Post delete successfully!');
    }

    public function detail($id){
        $post = Post::find($id);
        return view("admin.post-detail",[
            "post" => $post,
        ]);
    }

    public function update($id){
        $categories = Category::all();
        $post = Post::find($id);
        return view("admin.post-update",[
            "categories" => $categories,
            "post" => $post,
        ]);
    }

    public function upgrate(Request $request){
        $validator = validator(request()->all(),[
            'name' => ['required', 'string', 'max:255'],
            'image' => ['required|image|mimes:jpeg,png,jpg,gif,svg|max:4096'],
            'description' => ['required'],
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        };

        if ($request->file('file')) {
            $file = $request->file('file');
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->move('uploads/' ,  $fileName);  

            $affected = DB::table('posts')
            ->where('id', $request->id)
            ->update([
                'name' => $request->name,
                'categroy_id' => $request->category,
                'description' => $request->description,
                'image' => $fileName
            ]);
           
          }

        

        return back()->with('success','Post Update successfully!');
    }
}
