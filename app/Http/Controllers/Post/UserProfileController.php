<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\post;
use App\user_profile;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserProfileController extends Controller
{
    public function profile()
    {
        $user=Auth::user();
        return view('profile.Profile', compact('user'));
    }
    public function update_avatar(Request $request)
    {
        $values=$request->only(['name','about','company','job','country','address','phone','sm_link']);
        Auth()->user()->update($values);
        if ($request->hasFile('avatar')) {
            $filename = $request->avatar->getClientOriginalName();
            $request->avatar->storeAs('avatars', $filename, 'public');
            Auth()->user()->update(['avatar'=>$filename,]);
        }

        return redirect(route('showprofile'));
    }
    public function showprofile()
    {
        $user=Auth::user();
        $data=post::count();
        return view('profile.showprofile', compact('user', 'data'));
    }
}
