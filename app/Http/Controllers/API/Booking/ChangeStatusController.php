<?php

namespace App\Http\Controllers\API\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\WorkingTime;
use Illuminate\Support\Carbon;

class ChangeStatusController extends Controller
{
    public function __invoke(User $user, Booking $book){
        $book->update(['status' => 1]);
        $books = Booking::where('user_id', $user->id)->get()->sortDesc();
        foreach($books as $b){
            $b['time'] = WorkingTime::where('id', $b->time_id)->value('time');
        }
        return response($books);
    }
}
