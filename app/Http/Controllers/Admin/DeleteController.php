<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DeleteController extends Controller
{
    public function __invoke(){
        $users = User::all();
        return view('admin.index');
    }
}
