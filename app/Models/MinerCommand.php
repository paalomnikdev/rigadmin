<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MinerCommand extends Model
{
    public $table = 'miner_commands';
    public $fillable = [
        'title',
        'command',
        'miner_id',
    ];

    public function miner()
    {
        return $this->belongsTo(Miner::class);
    }
}
