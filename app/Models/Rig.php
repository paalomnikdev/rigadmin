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
        return $this->hasMany('App\Models\Videocard');
    }

    public static function findOrCreate($ip)
    {
        $obj = static::where('address', '=', $ip)->first();
        return $obj ?: new static;
    }
}
