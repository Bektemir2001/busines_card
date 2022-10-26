<?php

namespace App\Http\Controllers\API\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\WorkingTime;
use Illuminate\Support\Carbon;

class DeleteBooksController extends Controller
{
    public function __invoke(User $user){
        $books = Booking::where('user_id', $user->id)->get();;
        foreach($books as $b){
            $b->delete();
        }
        return response(['message' => 'all books deleted successfully']);
    }
}
