<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'productos';
    protected $fillable = ['cantidadProd'];

    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
        
    }
    public function ventas(){
        //modelo al que apunta,nombre tabla pivote
        return $this->belongsToMany('App\Models\Venta');
    }
}
