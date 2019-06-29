<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Postimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function getNewPost()
    {
        $category=Category::get();
        return view('backEnd.post.new-post')->with(['category'=>$category]);
    }

    public function getPosts()
    {
        $posts=Post::orderBy('id','desc')->get();
//        foreach ($posts[0]->postImage as $i)
//        {
//            echo $i->image;
//        }

        return view('backEnd.post.posts')->with(['posts'=>$posts]);
    }

    public function postNewPost(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|unique:posts',
            'qty'=>'required',
            'price'=>'required',
            'description'=>'required',
            'category'=>'required'
        ]);
        $image=$request->file('image');
        $title=$request['title'];
        $desc=$request['description'];
        $cat_id=$request['category'];
        $price=$request['price'];
        $qty=$request['qty'];

        $post=new Post();
        $post->user_id=Auth::User()->id;
        $post->title=$title;
        $post->price=$price;
        $post->description=$desc;
        $post->category_id=$cat_id;
        $post->qty=$qty;
        $post->save();

        foreach ($image as $i)
        {
            $img_name=$i->getClientOriginalName();
            $post_image=new Postimage();
            $post_image->image=$img_name;
            $post_image->post_id=$post->id;
            $post_image->save();

            Storage::disk('images')->put($img_name,File::get($i));
        }
        //dd($post->id);
        return redirect()->back()->with('info','Post Upload is successful');
    }

    public function getPostImage($img_name)
    {
        $images=Storage::disk('images')->get($img_name);
        return response($images,'200')->header('Content-type','*.*');

    }

    public function getPostDelete($id)
    {
        $post=Post::whereId($id)->first();
        foreach ($post->postImage as $img)
        {
            Storage::disk('images')->delete($img->image);
            $img->delete();
        }
        $post->delete();

        return redirect()->back()->with('info','Post is deleted');
    }

    public function getPostEdit($id)
    {
        $category=Category::get();
        $post=Post::whereId($id)->firstOrFail();
        return view('backEnd.post.postedit')->with(['post'=>$post,'category'=>$category]);
    }

    public function postPostEdit(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'price'=>'required',
            'qty'=>'required',
            'description'=>'required',
            'category'=>'required'
        ]);

        $id=$request['id'];
        $title=$request['title'];
        $price=$request['price'];
        $description=$request['description'];
        $cat_id=$request['category'];
        $image=$request->file('image');
        $qty=$request['qty'];

        $post=Post::whereId($id)->firstOrFail();
        $post->title=$title;
        $post->price=$price;
        $post->qty=$qty;
        $post->description=$description;
        $post->category_id=$cat_id;
        $post->update();
        if($image!=null)
        {
            foreach ($post->postImage as $img)
            {
                Storage::disk('images')->delete($img->image);
                $img->delete();
            }
            foreach ($image as $i)
            {
                $img_name=$i->getClientOriginalName();
                $post_image=new Postimage();
                $post_image->image=$img_name;
                $post_image->post_id=$id;
                $post_image->save();

                Storage::disk('images')->put($img_name,File::get($i));
            }

        }
        return redirect()->back()->with('info','OK');
    }

}
