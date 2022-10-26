<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UpdateUserController extends Controller
{
    public function __invoke(Request $request, User $user){
        $file = null;
        $filel = null;
        $type_image = gettype($request->image);
        $type_logo =  gettype($request->logo);
        
        if($type_image == 'string'){
            $file = '';
        }
        else{
            $file = Storage::disk('public')->put('users',$request->image);
            $file = '/storage/'.$file;
        }
        
        if($type_logo == 'string'){
            $filel = '';
        }
        else{
            $filel = Storage::disk('public')->put('users',$request->logo);
            $filel = '/storage/'.$filel;
        }
        
        
        $data = $request->toArray();
        if($file == ''){
            unset($data['image']);
        }
        else{
            $data['image'] = $file;
        }
        if($filel == ''){
            unset($data['logo']);
        }
        else{
            $data['logo'] = $filel;
        }

        $user->update($data);
        unset($user['password']);
        unset($user['token']);
        return response($user);
    }
}