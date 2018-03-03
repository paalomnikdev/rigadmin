<?php
/**
 * Created by PhpStorm.
 * User: ivancherniy
 * Date: 03.03.2018
 * Time: 16:47
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    protected $fillable = [
        'name',
        'address',
        'port',
    ];

    public $timestamps = false;
}