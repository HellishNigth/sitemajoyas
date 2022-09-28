<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use DateTime;

class Usuario extends Authenticable
{
    use HasFactory;

    protected $table = 'usuarios';

    public function registrarUltimoLogin(){
        $this->ultimo_login = new DateTime('NOW');
        $this->save();
    }

    public function rol(){
        return $this->belongsTo('App\Models\Rol');
    }
}
