<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videocard extends Model
{
    public $table = 'videocard';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'fan_speed',
        'power_limit',
        'temperature',
        'memory_overclock',
        'core_overclock',
    ];

    public function rig()
    {
        return $this->belongsTo('App\Rig', 'rig_id');
    }

    public static function findOrCreate($rigId, $idOnRig)
    {
        $obj = static::where('rig_id', '=', $rigId)
            ->where('id_on_rig', '=', $idOnRig)
            ->first();
        return $obj ?: new static;
    }
}
