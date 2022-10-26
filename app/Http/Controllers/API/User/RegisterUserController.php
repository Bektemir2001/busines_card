<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    public function __invoke(Request $request){

        $user = User::where('email', $request->email)->get();
        if(count($user) == 0){
            return abort(400, 'пользователь не найдено');
        }
        $token = Hash::make($request->password);
        $user[0]->update([
            'password' => $request->password,
            'token' => $token
        ]);

        return response($user[0]);
    }
}
