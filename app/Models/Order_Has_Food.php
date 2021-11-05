<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Has_Food extends Model
{
    use HasFactory;
    protected $table = 'order_has_food';
    public $timestamps = true;
    protected $fillable = [
        'foodId',
        'orderId'
    ];
}
