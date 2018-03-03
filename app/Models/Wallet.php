<?php
/**
 * Created by PhpStorm.
 * User: ivancherniy
 * Date: 03.03.2018
 * Time: 15:11
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'name',
        'address',
        'currency_id'
    ];

    public function currency()
    {
        return $this->belongsTo(\App\Models\Currency::class);
    }
}