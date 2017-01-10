<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class ProfilesController extends Controller
{
    public function index ($slug) {

	    $user = User::where('slug', $slug)->first();

	    return view('profiles/profile')->with('user', $user);
    }


    public function edit () {
	    return view('profiles.edit')->with('info', Auth::user()->profile);
    }

    public function update (Request $request) {

		$this->validate($request, [

			'location' => 'required',
			'about' => 'required|max:500'
		]);

	    Auth::user()->profile()->update([
	    	'location' => $request->location,
		    'about' => $request->about
	    ]);


	    if ($request->hasFile('avatar')){

		    Auth::user()->update([

		    	'avatar' => $request->avatar->storage('public/avatars')
		    ]);

	    };

	    Session::flash('succes', 'Профиль был изменен');

	    return redirect()->back();

    }
}
