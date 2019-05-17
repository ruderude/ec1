<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users($id){

        // dd($id);

        $user = User::find($id);

        return view('auth.profile', ['user' => $user]);
    }

    public function edit($id){

        $user = User::find($id);

        return view('auth.profileEdit', ['user' => $user]);
    }

    public function update(Request $request){

        $this->validate($request, User::$rules);
        // dd($request);
        $user = User::find($request->id);
        // dd($user);
        $form = $request->all();
        unset($form['_token']);
        $user->fill($form)->save();
        $url = '/users/' . $request->id;
        return redirect($url)->with('my_status', __('編集が完了しました。'));
    }
}
