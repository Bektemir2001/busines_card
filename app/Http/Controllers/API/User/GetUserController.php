<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class GetUserController extends Controller
{
    public function __invoke(User $user){
        return response($user);
    }
}
