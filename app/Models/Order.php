<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id'];
    use HasFactory;

    public function orderItem()
    {
        return $this->hasMany('App\Models\OrderItem', 'order_id', 'id');
    }
}
