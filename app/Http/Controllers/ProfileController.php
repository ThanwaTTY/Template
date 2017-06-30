<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ProfileController extends Controller
{
	public function index()
	{
		return view('profile');
	}    

	public function update()
	{
		$this->validate( request(), [
            'name' => 'required|string|max:255|min:3',
            'old_password' => 'required|old_password',
            'password' => 'required|string|min:6|confirmed',
			]);

		$user = auth()->user();

		$user->name = request('name');
		$user->password = bcrypt( request('password'));
		$user->save();

		return back()->with('status','Update complete!');
	}
}
