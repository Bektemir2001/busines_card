<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;
use OpenApi\Annotations as OA;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    
    protected $table = 'users';
    protected $guarded = false;

    public function workingTime(){
        return $this->hasMany(WorkingTime::class, 'user_id', 'id');
    }}
