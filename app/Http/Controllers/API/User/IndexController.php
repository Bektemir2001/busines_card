<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke(){
        $users = User::all();
        return response($users);
    }
}
