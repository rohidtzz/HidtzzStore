<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;

use App\Models\User;

use App\Models\Address;

use Validator;

class ProfileController extends Controller
{

    public function user()
    {

        $user_id = Auth()->user()->id;

        $user = User::find($user_id);

        return view('home.profile.user',compact('user'));
    }

    public function user_post(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'id' => ['required', 'integer'],
        ]);

        if($validator->fails()) {
            return back()->with('errors', $validator->messages())->withInput();
        }

        User::find($request->id)->update([
            'name' => $request->name
        ]);


        return redirect('profile/account')->withSuccess('Data Berhasil diubah');
    }

    public function address()
    {

        $user_id = Auth()->user()->id;

        $address = Address::find($user_id);

        return view('home.profile.alamat',compact('address'));

    }
}
