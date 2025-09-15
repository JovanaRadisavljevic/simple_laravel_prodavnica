<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranac extends Model
{
    use HasFactory;
    protected $table='ranac';
    protected $fillable = ['model','zapremina','tezina','price','stock'];
    protected $casts = ['zapremina'=>'integer','tezina'=>'decimal:2','price'=>'decimal:2'];

    public function stavke()
    {
        return $this->hasMany(StavkaOrder::class, 'ranac_id');
    }
}
