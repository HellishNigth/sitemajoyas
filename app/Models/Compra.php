<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compra extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'compras';
    

    public function productos(){
        return $this->belongsToMany('App\Models\Producto');
    }
    public function proveedor(){
        return $this->belongsTo('App\Models\Proveedor'); 
    }
}
