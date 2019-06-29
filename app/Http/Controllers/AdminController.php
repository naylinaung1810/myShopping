<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function getDashboard()
    {
        return view('backEnd.dashboard');
    }

    public function getUsers()
    {
        $users=User::get();
        return view('backEnd.users.users')->with(['users'=>$users]);
    }

    public function getImages($img_name)
    {
        $image=Storage::disk('cat_image')->get($img_name);
        return response($image,'200')->header('Content-type','*.*');
    }

    public function getCategories()
    {
        $category=Category::get();
        return view('backEnd.category.category')->with(['category'=>$category]);
    }

    public function getNewCategory()
    {
        return view('backEnd.category.new-category');
    }

    public function postNewCategory(Request $request)
    {
        $this->validate($request,[
            'img'=>'required',
            'category'=>'required'
        ]);

        $image=$request->file('img');
        $category=$request['category'];

       $img_name=date('ymd-his').'.'.$image->getClientOriginalExtension();
       $cat=new Category();
       $cat->image=$img_name;
       $cat->name=$category;
       $cat->save();

       Storage::disk('cat_image')->put($img_name,File::get($image));

       return redirect()->back()->with('info','Category adding is successful');


    }

    public function removeImage($id)
    {
        $cat=Category::whereId($id)->firstOrFail();
        Storage::disk('cat_image')->delete($cat->image);
        $cat->delete();

        return redirect()->back()->with('info','Your Category delection is success');

    }

    public function getUserDetail($id)
    {
        $user=User::whereId($id)->firstOrFail();
        return view('backEnd.users.userdetail');
    }
}
