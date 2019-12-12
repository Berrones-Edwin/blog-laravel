<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PageController extends Controller
{
    //

    public function blog()
    {
        $posts = Post::orderBy('id','desc')
                        ->where('status','PUBLISHED')
                        ->paginate(3);

        return view('web.posts',compact('posts'));
    }
    
    public function post($slug)
    {
        $post = Post::where('slug',$slug)->with('category','tags')->first();
        
        // dd($post);
        return view('web.post',compact('post'));

    }
    public function category($slug)
    {
        $category = Category::where('slug',$slug)->pluck('id')->first();

        $posts = Post::orderBy('id','desc')
                        ->where('status','PUBLISHED')
                        ->where('category_id',$category)
                        ->paginate(3);

        return view('web.posts',compact('posts'));

    }
    public function tag($slug)
    {
        $step = null;
        $posts = Post::orderBy('id','desc')
                        ->whereHas('tags',function($query) use($slug){
                           $query->where('slug',$slug);
                            $step = $query;
                        })
                        ->where('status','PUBLISHED')
                        ->paginate(3);
                        // dd($posts);

        return view('web.posts',compact('posts'));

    }
}
