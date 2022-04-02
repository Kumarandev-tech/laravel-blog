<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = post::latest()->get();
        $data = post::count();
        return view('home', [
            'posts' => $posts,
            'data' => $data
        ]);
    }

    public function Allpost()
    {
        $posts = post::all();
        $data=count($posts);
        return view('welcome', [
            'posts'=>$posts,
            'data'=>$data
    ]);
    }

    public function Delete($id)
    {
        $post = Post::findOrFail($id);
        $post -> delete();
        return back()-> with('success', ''.$id.'post is Delete in successfully');
    }
    public function viewpost($id)
    {
        $data = post::count();
        $post = post::findOrFail($id);
        return view('post.view', compact("post", "data"));
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $data = post::count();
        $posts = post::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('category', 'LIKE', "%{$search}%")
            ->get();
        return view('home', compact('posts', 'data'));
    }
}
