<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $table='cart_item';
    protected $fillable = [
        'cart_id',
        'product_id',
        'product_type',   
        'quantity',
        'price_snapshot', 
        'subtotal',       
    ];
    public function cart(){ return $this->belongsTo(Cart::class); }
    public function product()
    {
        return $this->morphTo();
    }
}
