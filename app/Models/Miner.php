<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Miner extends Model
{
    public function rigs()
    {
        return $this->hasMany(Rig::class, 'current_miner');
    }

    public function commands()
    {
        return $this->hasMany(MinerCommand::class, 'miner_id');
    }
}
