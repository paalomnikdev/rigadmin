<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rig extends Model
{
    public $table = 'rig';
    public $timestamps = false;

    public function __toString()
    {
        return $this->getAttribute('name') ?: 'Unnamed card';
    }

    public function videocards()
    {
        return $this->hasMany(Videocard::class);
    }

    public function miner()
    {
        return $this->belongsTo(Miner::class);
    }

    public static function findOrCreate($ip)
    {
        $obj = static::where('address', '=', $ip)->first();
        return $obj ?: new static;
    }
}
