<?php

namespace App\Http\Controllers\API\WorkingTime;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\WorkingTime;

class StoreController extends Controller
{
    public function __invoke(Request $request, User $user){
        $time = $request->time;
        if(strlen($time) != 5){
            return abort(400,'the time most be like hh:mm');
        }
        $data = WorkingTime::where('time', $time)->get();
        if(count($data) != 0){
            return abort(400,'this time alredy exist');
        }
        WorkingTime::create([
            'user_id' => $user->id,
            'time' => $time
        ]);
        $working_times = WorkingTime::where('user_id', $user->id)->get();
        return response($working_times);
    }
}
