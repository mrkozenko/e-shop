<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table="items";
    protected $fillable = [
        'id',
        'title',
        'price',
        'count',
        'age',
        'description',
        'category_id',
    ];



    public function images() {
         return $this->hasMany('\App\Models\ItemImage');
    }
    public function category() {
        return $this->belongsTo('App\Models\Category');
    }
    public function itemOrder() {
        return $this->belongsTo('App\Models\OrderItem');
    }
}
