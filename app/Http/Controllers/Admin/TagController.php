<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Helpers
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

use App\Http\Requests\TagRequest;
use App\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = Tag::orderBy('id','desc')->paginate(10);
        return view('admin.tag.index',compact('tags'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // dd('hola');
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $slug = Str::slug($request->name);
        $data = Arr::add($request->all(), 'slug' , $slug );
        Tag::create($data);
        return  redirect()->route('tags.index')->with('mensaje','La etiqueta se agrego correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tag.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, Tag $tag)
    {
        //
        $slug = Str::slug($request->name);
        $data = Arr::add($request->all(), 'slug' , $slug );
        $tag->update($data);
        return  redirect()->route('tags.index')->with('mensaje','La etiqueta se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return  redirect()->route('tags.index')->with('mensaje','La etiqueta se dio de baja');
    }
}
