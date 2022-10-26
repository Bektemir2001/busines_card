<?php

namespace App\Http\Controllers\API\WorkingTime;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Booking;
use App\Models\User;
use App\Models\WorkingTime;

class DeleteController extends Controller
{
    public function __invoke(WorkingTime $time){
        $books = Booking::where('time_id', $time->id)->get();
        foreach($books as $b){
            $b->delete();
        }
        $time->delete();
        return response(['message' => 'Time deleted successfully']);
    }
}
