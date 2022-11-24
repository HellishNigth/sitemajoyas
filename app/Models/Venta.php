<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'ventas';

    public function productos(){
        return $this->belongsToMany('App\Models\Producto');
    }
    public function cliente(){
        return $this->belongsTo('App\Models\Cliente'); 
    }
    
}
