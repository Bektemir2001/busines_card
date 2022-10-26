<?php

namespace App\Http\Controllers\API\WorkingTime;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Booking;
use App\Models\User;
use App\Models\WorkingTime;

class GetController extends Controller
{
    public function __invoke(User $user){
        $times = WorkingTime::where('user_id', $user->id)->get();
        return response($times);
    }
}
