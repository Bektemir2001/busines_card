<?php

namespace App\Http\Controllers\API\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\WorkingTime;
use Illuminate\Support\Carbon;

class GetBooksController extends Controller
{
    public function __invoke(User $user){
        $books = Booking::where('user_id', $user->id)->orderBy("created_at","DESC")->get();
        foreach($books as $b){
            $b['time'] = WorkingTime::where('id', $b->time_id)->value('time');
        }
        return response($books);
    }
}