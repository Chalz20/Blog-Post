<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{

    public function index(){
          $posts = Posts::all();

          return view('admin.posts' , ['posts'=>$posts]);
    }

    public function show($id)
    {
        $post = Posts::findOrFail($id);

        return view('blog', ['post' => $post]);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(){
        $inputs = request()->validate([
            'title'=>'required',
            'image' => 'file',
            'body'=>'required  '
        ]);

        if(request('image')){
           $inputs['image'] = request('image')->store('images');
        }

        auth()->user()->posts()->create($inputs);

        \session()->flash('create-message', 'Post has been successfully created');

        return redirect()->route('admin.posts');
    }

    public function destroy(Posts $post){
        $this->authorize('delete' , $post);

        $post->delete();

        Session::flash('message', 'Post has been deleted');
        return back();

    }

    public function edit(Posts $post){
         return view('admin.edit', ['post'=>$post]);
    }

    public function update(Posts $post){
        $inputs = request()->validate([
            'title'=>'required',
            'image' => 'file',
            'body'=>'required  '
        ]);

        if(request('image')){
            $inputs['image'] = request('image')->store('images');
            $post->image = $inputs['image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        $this->authorize('update' , $post);

        $post->save();

        \session()->flash('update-message', 'Post has been successfully updated');

        return redirect()->route('admin.posts');




    }
}