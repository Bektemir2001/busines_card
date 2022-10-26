<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UpdateController extends Controller
{
    public function __invoke(Request $request, User $user){

        if($request->image){
            $file = Storage::disk('public')->put('users',$request->image);
            $file = '/storage/'.$file;
            $request->image = $file;
        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->middle_name = $request->middle_name;
        $user->image = $request->image;
        $user->subject = $request->subject;
        $user->description = $request->description;
        $user->phone_number = $request->phone_number;
        $user->link_to_instagram = $request->link_to_instagram;
        $user->link_to_youtube = $request->link_to_youtube;
        $user->link_to_linkedin = $request->link_to_linkedin;
        $user->link_to_telegram = $request->link_to_telegram;
        $user->email = $request->email;
        $user->address = $request->address;

        $user->save();

        return back()->withSuccess('Пользователь успешно обновлен');
    }
}
