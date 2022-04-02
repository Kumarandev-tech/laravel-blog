<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = post::all();
        $data=post::count();

        return view('post.home',[
            'posts'=>$posts,
            'data'=>$data
        ]);
    }

    public function create()
    {
        return view('post.create');
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
        return redirect('create')->with('success', 'post is stored in successfully')->with('image', $post->image);
    }

    public function viewpost($id)
    {
        $post=post::findOrFail($id);
        return view('post.view', compact("post"));
    }
    public function edit($id)
    {
        $post=post::find($id);
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post= post::findOrFail($id);
        $post->title=request('title');
        $post->title=request('category');
        $post->content=request('content');
        $post->description=request('description');
        $post->image=request()->file('image')->store('public/images');
        $post->save();
        return redirect(route('index'))->with('success', 'post is update successfully');
        ;
    }
    public function Delete($id)
    {
        $post=post::findOrFail($id);
        $post->delete();
        return back()->with('success', ''.$id.'post is Delete in successfully');
    }
    public function Truncate($id)
    {
        $post=post::findOrFail($id);
        $post->truncate();
        return back()->with('success', ''.$id.' Delete alll successfully');
    }
    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $posts = post::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('category', 'LIKE', "%{$search}%")
            ->get();

        $data=count($posts);
        return view('home', compact('posts','data'));
    }
}
