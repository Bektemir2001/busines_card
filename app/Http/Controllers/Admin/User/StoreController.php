<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\User\StoreRequest;
use Illuminate\Support\Facades\Storage;
use App\Mail\ActivateUser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request){
       
        $data = $request->validated();
        try{
            DB::beginTransaction();
            if(array_key_exists('image', $data)){
                $data['image'] = Storage::disk('public')->put('/users', $data['image']);
                $data['image'] = '/storage/'.$data['image'];
            }
            $user = User::create($data);
            Mail::to($user->email)->send(new ActivateUser($user->id));
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
            return response($e);
        }
        
       return redirect()->back()->withSuccess('Пользователь успешно добавлен');
    }
}
