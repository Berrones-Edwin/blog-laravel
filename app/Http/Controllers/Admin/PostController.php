<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// Helpers
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

use App\Http\Requests\PostRequest;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id =  auth()->user()->id;
        $posts = Post::where('user_id',$id)->orderBy('id','desc')->paginate(10);
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::orderBy('name','ASC')->pluck('name','id')->toArray();
        $tags = Tag::orderBy('name','ASC')->pluck('name','id')->toArray();

        // dd($categories);
        return view('admin.post.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $dataPost = $request->all();
        if($request->hasFile('file')){

            $dataPost['file'] = $request->file('file')->store('image','public');
        }

        // data
        $slug = Str::slug($request->name);
        $data = Arr::add($dataPost, 'slug' , $slug );
        $post = Post::create($data);
      
        // Tags
        $post->tags()->sync($request->get('tags'));


        return  redirect()->route('posts.index')->with('mensaje','La entrada se agrego correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $post = Post::where('slug',$slug)->get()->first();
        return view('admin.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $categories = Category::orderBy('name','ASC')->pluck('name','id');
        $tags = Tag::orderBy('name','ASC')->pluck('name','id');
        return view('admin.post.edit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        //
        $dataPost = $request->all();

        if($request->hasFile('file')){
            
            Storage::delete("public/${$request->file}");

            $dataPost['file'] = $request->file('file')->store('image','public');
        }

        $slug = Str::slug($request->name);
        $data = Arr::add($request->all(), 'slug' , $slug );
        $post->update($data);
        
        $post->tags()->sync($request->get('tags'));
        
        return  redirect()->route('posts.index')->with('mensaje','La entrada se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
      

        if(Storage::delete('public/'.$post->file)){
            $post->delete();
        }

        return redirect('posts.index')
                ->with('Mensaje','Empleado eliminado');
        
    }
}
