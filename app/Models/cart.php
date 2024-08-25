<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $fillable = [

        'user_id',
        'prod_id',
        'prod_qty',
        // 'is_active',
        // 'is_deleted',
    ];

    // public $timestamps = false;
}
