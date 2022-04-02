<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;

class AllpostController extends Controller
{
    public function allpost()
    {
        $posts=post::all();
        return view('welcome', ['posts'=>$posts]);
    }
}
