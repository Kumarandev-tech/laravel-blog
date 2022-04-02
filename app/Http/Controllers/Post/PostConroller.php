<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostConroller extends Controller
{
    public function create()
    {
        $data=post::count();
        $posts=post::all();
        return view('post.create', compact('posts','data'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'category'=>'required',
            'content'=>'required',
            'description'=>'required',
            'image' => 'required',

        ]);
        $post=new post;
        $post->title=request('title');
        $post->category=request('category');
        $post->content=request('content');
        $post->description=request('description');
        $post-> image = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $post->image);
        $post->save();
        return redirect('home')->with('success', 'post is stored in successfully')->with('image', $post->image);
    }
    public function viewpost($id)
    {
        $posts=post::findOrFail($id);
        $data=post::count();
        return view('post.view', compact("posts","data"));
    }
    public function search(Request $request)
    {
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $posts = post::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('category', 'LIKE', "%{$search}%")
            ->get();

        // Return the search view with the resluts compacted
        return view('home', compact('posts'));
    }


}
