<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function show(){
        $category = Category::latest()->paginate(10);
        return view("admin.category",[
            "category" => $category,
        ]);
    }

    public function create(Request $request){
        $validator = validator(request()->all(),[
            'name' => ['required', 'string', 'max:255', 'unique:categories'],
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }


        Category::create([
            'name' => $request->name,
        ]);


         return back()->with('success','Category created successfully!');
    
    }

    public function delete($id){
        $user = Category::find($id);
        $user->delete();

        return redirect("/admin/category")->with('success','Category delete successfully!');
    }

    public function update($id){
        $select_category = Category::find($id);
        $category = Category::latest()->paginate(10);
        return view("admin.category-edit",[
            "category" => $category,
            "select_category" => $select_category,
        ]);
    }

    public function upgrate(Request $request){

        $validator = validator(request()->all(),[
            'name' => ['required', 'string', 'max:255', 'unique:categories'],
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $affected = DB::table('categories')
        ->where('id', $request->id)
        ->update(['name' => $request->name]);

        return back()->with('success','Category Update successfully!');
    }
}
