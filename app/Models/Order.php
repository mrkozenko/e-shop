<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table="orders";
    protected $fillable = [
        'id',
        'user_id',
        'count',
        'address',
        'summa',
        'status'
    ];
    public function user()
    {
        return $this->hasOne('\App\Models\User');
    }
    public function  OrderItems()
    {
        return $this->hasMany('\App\Models\OrderItem');
    }
}
