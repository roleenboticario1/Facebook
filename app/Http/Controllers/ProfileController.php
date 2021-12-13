<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($slug)
    {
    	return view('profile.index')->with('data', Auth::user()->profile);
    }

    public function uploadPhoto(Request $request)
    {
        // dd($request->all());
        $file = $request->file('pic');
        $filename = $file->getClientOriginalName();

        $path = '../public/img';

        $file->move($path, $filename);
        $user_id = Auth::user()->id;

        DB::table('users')->where('id', $user_id)->update(['pic' => $filename]);
        //return view('profile.index');
        return back();
    }

    public function editProfileForm()
    {
        return view('profile.editProfile')->with('data', Auth::user()->profile);
    }

    public function updateProfile(Request $request)
    {
        $user_id = Auth::user()->id;
        DB::table('profiles')->where('user_id', $user_id)->update($request->except('_token'));
        return back();
    }


    //======================  Freind =============================== //

    public function findFriends()
    {
        $uid = Auth::user()->id;
        $allUsers = DB::table('profiles')->rightJoin('users', 'users.id', '=','profiles.user_id')->where('users.id', '!=', $uid)->get();
        //same lang
        // $allUsers = DB::table('users')->rightJoin('profiles', 'users.id', '=','profiles.user_id')->where('users.id', '!=', $uid)->get();

        return view('profile.findFriends', compact('allUsers'));
    }

    //Add Friend Fundtion
    public function sendFriendRequest($id)
    {
       Auth::user()->addFriends($id);
       return back();
    }
}
