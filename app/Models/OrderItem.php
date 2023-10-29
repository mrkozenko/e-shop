<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'count',
        'item_id',
        'order_id'

    ];
    public function items()
    {
        return $this->hasMany('\App\Models\Item');
    }
    public function  Order()
    {
        return $this->hasOne('\App\Models\Order');
    }
}
