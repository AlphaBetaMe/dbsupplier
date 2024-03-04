<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SettingController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth'); //If user is not logged in then he can't access this page
    }
 
    public function edit($id)
    {
        $users = User::find(Auth::user()->id);
        return view('users.updatepassword',compact('users'));
    }
 
 
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'oldpassword' => 'required',
            'newpassword' => 'required',
        ]);
    
        $user = Auth::user();
    
        $hashedPassword = $user->password;
    
        if (\Hash::check($request->oldpassword , $hashedPassword )) {
            if (!\Hash::check($request->newpassword , $hashedPassword)) {
                // Update the password
                $user->password = bcrypt($request->newpassword);
                $user->save();
    
                session()->flash('success','Password updated successfully');
                return redirect()->back();
            } else {
                session()->flash('error','New password cannot be the same as the old password!');
                return redirect()->back();
            }
        } else {
            session()->flash('error','Old password does not match');
            return redirect()->back();
        }
    }
    
}
