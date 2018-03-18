<?php
/**
 * Created by PhpStorm.
 * User: ivancherniy
 * Date: 03.03.2018
 * Time: 15:20
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public $table = 'currencies';
    protected $fillable = [
        'name',
        'symbol',
        'secondary',
    ];

    public function __toString()
    {
        return $this->getAttribute('name') ?? 'Unknown';
    }

    public function wallets()
    {
        return $this->hasMany(\App\Models\Wallet::class);
    }
}