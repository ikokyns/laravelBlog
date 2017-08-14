<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
    	return view('register.create');
    }

        public function store()
    {
    	$this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = new User;

        /*
		User::create([
			'name' => request('name')
		]);
        */

        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));

        $user->save();

        auth()->login($user);

        return redirect('/posts');
    }
}