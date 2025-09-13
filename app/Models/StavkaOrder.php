<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StavkaOrder extends Model
{
    use HasFactory;
    protected $table = 'stavka_orders';

    protected $fillable = [
        'order_id',
        'sator_id',   // FK na sator (može NULL)
        'ranac_id',   // FK na ranac (može NULL)
        'quantity',
        'unit_price',
    ];

    protected $casts = ['quantity'=>'integer','unit_price'=>'decimal:2'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function sator()
    {
        return $this->belongsTo(Sator::class, 'sator_id');
    }

    public function ranac()
    {
        return $this->belongsTo(Ranac::class, 'ranac_id');
    }

    // Helper: vrati konkretan proizvod (šator ili ranac)
    public function product()
    {
        return $this->sator ?? $this->ranac;
    }
}
