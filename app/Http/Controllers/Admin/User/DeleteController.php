<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WorkingTime;
use App\Models\Booking;

class DeleteController extends Controller
{
    public function __invoke(User $user){
        $working_times = WorkingTime::where('user_id', $user->id)->get();
        foreach($working_times as $w){
            $books = Booking::where('time_id', $w->id)->get();
            foreach($books as $b){
                $b->delete();
            }
            $w->delete();
        }
        $user->delete();
        return back()->withSuccess('Пользователь успешно удалено');
    }
}
