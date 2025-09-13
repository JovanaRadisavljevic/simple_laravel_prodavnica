<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';

    protected $fillable = ['user_id','placed_at','status','total'];
    protected $casts = ['placed_at' => 'datetime', 'total' => 'decimal:2'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function stavke()
    {
        return $this->hasMany(StavkaOrder::class, 'order_id');
    }
}
