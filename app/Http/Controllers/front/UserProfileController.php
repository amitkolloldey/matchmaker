<?php

namespace App\Http\Controllers\front;

use App\Http\Requests\PasswordChangeRequest;
use App\Http\Requests\ProfileImageRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{

    public function profile($id)
    {
        $user = User::findOrFail($id);
        return view('front.profile',compact('user'));
    }



    public function update(ProfileUpdateRequest $request,$id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect(route('user.profile',$user->id))->with('profile_update_success','Your Profile Updated');
    }



    public function profileimage (ProfileImageRequest $request,$id)
    {
        $user_data = $request->all();
        if(isset($user_data['image']) ){
            $photo =  $user_data['image'];
            $photo_name =  time().$photo->getClientOriginalName();
            $photo->move('uploads',$photo_name);
            $user = User::findOrFail($id);
            $user->update(['image' => $photo_name]);
        }
        return redirect(route('user.profile',$user->id))->with('image_update_success','Your Image Updated');
    }



    public function show($id)
    {
        $user = User::findOrFail($id);
        if($user->public_visibility == 1 ){
            return view('front.showprofile',compact('user'));
        }
        return redirect('/');
    }



    public function passwordchangeform($id)
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('front.profileresetpass',compact('user'));
    }



    public function passwordchange(PasswordChangeRequest $request,$id)
    {
        $password = bcrypt($request->password);
        $user = User::findOrFail($id);
        $user->update(['password' => $password]);
        return redirect(route('user.profile',$user->id))->with('password_update_success','Your Password Updated Successfully.');
    }


    public function shareprofile($id)
    {
        $user = User::findOrFail($id);
        return view('front.profileshare',compact('user'));
    }

}
