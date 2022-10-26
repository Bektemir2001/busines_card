<?php

namespace App\Http\Controllers\API\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\WorkingTime;
use Illuminate\Support\Carbon;

class StoreController extends Controller
{
    public function __invoke(Request $request, User $user){
        $bookings = Booking::where('time_id', $request->time_id)
        ->where('date', $request->date)->get();

        if(count($bookings) != 0){
            return abort(400,'это место уже занято');
        }
          
        Booking::create([
            'user_id' => $user->id,
            'time_id' => $request->time_id,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'date' => $request->date
        ]);
        
        return response(['message' => 'вы успешно бронировали место']);
    }
}
