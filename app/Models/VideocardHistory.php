<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideocardHistory extends Model
{
    public $table = 'videocard_history';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'fan_speed',
        'power_limit',
        'temperature',
        'memory_overclock',
        'core_overclock',
        'check_time'
    ];
}
