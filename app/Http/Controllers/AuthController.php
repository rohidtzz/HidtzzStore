<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Address;

use Auth;

use Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:50', 'min:3'],
            'username' => ['required', 'max:20', 'unique:users,username'],
            'password' => ['required'],
            'email' => ['required','email','unique:users,email'],
            'no_hp' => ['required', 'numeric'],
            // 'nik' => ['required', 'numeric']
        ]);

        if($validator->fails()) {
            return back()->with('errors', $validator->messages())->withInput();
        }


        $users = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            // 'nik' => $request->nik,
            'role' => 'user'
        ]);

        $address = Address::create([
            'city_id' => null,
            'province_id' => null,
            'name' => null,
            'alamat' => null,
            'kode_pos' => null,
            'user_id' => $users->id,
        ]);

        if(!$users || !$address){
            return redirect('/')->with('errors', 'Register Failed');
        }

        return redirect('/')->withSuccess('Register Success');

    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => ['required', 'max:20'],
            'password' => ['required'],
        ]);

        if($validator->fails()) {
            return back()->with('errors', $validator->messages())->withInput();
        }

        // dd($request->all());
        if(!Auth::attempt(['username' => $request->username, 'password' => $request->password])){
            return redirect('/')->with('errors', 'username or password is incorrect');
        }


        // Auth::attempt(['username' => $request->username, 'password' => $request->password]);

        // if(Auth()->user()->role == "admin" || Auth()->user()->role == "kordinator"){
        //     return redirect('/home');
        // }

        return redirect('/')->withSuccess('Login Success');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/')->withSuccess('Logout Success');
    }
}
