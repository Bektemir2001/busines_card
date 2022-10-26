<?php

namespace App\Http\Controllers\API\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\WorkingTime;
use Illuminate\Support\Carbon;

class GetTimesController extends Controller
{
    public function __invoke(User $user){
        
        
        $all_times = WorkingTime::where('user_id', $user->id)->get();
        

        return response($all_times);
    }
}
