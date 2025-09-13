<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sator extends Model
{
    use HasFactory;
    protected $table = 'sator';
    protected $fillable = ['model','sezona','brOsoba','tezina','price'];
    protected $casts = ['brOsoba'=>'integer','tezina'=>'decimal:2','price'=>'decimal:2'];

    public function stavke()
    {
        return $this->hasMany(StavkaOrder::class, 'sator_id');
    }
}
