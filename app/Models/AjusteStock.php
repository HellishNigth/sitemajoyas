<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AjusteStock extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'ajuste_stock';

    public function producto(){
        return $this->belongsTo('App\Models\Producto');

    }
}
