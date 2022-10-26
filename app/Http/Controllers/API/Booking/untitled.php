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
        $today = Carbon::today();
        if($today->format('l') == 'Sunday' || $today->format('l') == 'Saturday'){
            return response([]);
        }
        
        $all_times = WorkingTime::where('user_id', $user->id)->get();
        $today = Carbon::now();
        $t = explode(":",$today->toTimeString());
        $hour = $t[0];
        $minute = $t[1];
        $times = [];

        foreach($all_times as $time){
            $t = explode(":",$time->time);
            $t_h = $t[0];
            $t_m = $t[1];
            if((int) $t_h > (int) $hour){
                array_push($times, $time);
            }
            else if((int) $t_h == (int) $hour){
                if((int) $t_m > (int) $minute && (int) $t_m - (int) $minute > 15){
                    array_push($times, $time);
                }
            }
        }


        $now = explode("-", $today->toDateString());
        $free_times = [];
        foreach($times as $time){
            $is_book_exist = false;
            $bookings = Booking::where('time_id', $time->id)->get();
            foreach($bookings as $b){
                $t_b = explode("-",$b->created_at->toDateString());
                if((int) $now[0] == (int) $t_b[0] && (int) $now[2] == (int) $t_b[2] && (int) $now[1] == (int) $t_b[1]){
                    $is_book_exist = true;
                }
            }

            if(!$is_book_exist){
                array_push($free_times, $time);
            }
            
        }

        return response($free_times);
    }
}
