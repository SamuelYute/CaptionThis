<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class UsersController extends Controller
{
    //

    public function update(Request $request){
        $user = Auth::user();

        $this->validate($request, [
          'firstname' => 'required|string|max:255',
          'lastname' => 'required|string|max:255',
          'username' => 'required|string|max:255|unique:users,username,' . $user->id,
          'email' => 'string|email|max:255|unique:users,email,' . $user->id,
          'avatar' => 'image'
        ]);

        $user->update($request->all());

        if ($request->hasFile('avatar')) {
          ini_set('memory_limit','256M');
          $image = $request->file('avatar');

          $filename = time().'_avatar_'.'.'.$image->getClientOriginalExtension();

          $avatarFolder = storage_path().'/app/public/avatars';
          $avatarDBPath = '/storage/avatars/';

          if (!File::exists($avatarFolder)) {
              File::makeDirectory($avatarFolder);
          }

          Image::make($image)
            ->orientate()
            ->fit(400, 400)
            ->save($avatarFolder.'/'.$filename);

          $user->avatar = $avatarDBPath.$filename;

          $user->save();
        }

        flash('Success! Profile updated.','success');
        return redirect()->back();
    }

    public function updatePassword(Request $request){
        $user = Auth::user();

        if (Hash::check($request['old-password'], $user->password)) {
            $this->validate($request, [
                'old-password' => 'required|min:6',
                'password' => 'required|min:6|different:old-password|confirmed',
            ]);

            $user->password = bcrypt($request['password']);
            $user->save();

            return response('Success!',200);
        } else {
            return response('Error! Old Password Wrong',401);
        }
    }
}
