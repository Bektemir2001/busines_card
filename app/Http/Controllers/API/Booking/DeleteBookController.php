<?php

namespace App\Http\Controllers\API\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;

class DeleteBookController extends Controller
{
    public function __invoke(Booking $book, User $user){
        $book->delete();
        return response(['message' => 'book succsesufl deleted']);
    }
}
