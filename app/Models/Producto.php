<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'productos';

    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }
    public function ventas(){
        //modelo al que apunta,nombre tabla pivote
        return $this->belongsToMany(Venta::class,'producto_venta','venta_id','producto_id');
    }
}
