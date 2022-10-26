<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingTime extends Model
{
    use HasFactory;

    protected $table = 'working_times';
    protected $guarded = false;

    public function bookings(){
        return $this->hasMany(Booking::class, 'time_id', 'id');
    }
}
