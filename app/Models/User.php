<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable;
    protected $fillable = [];

    public function superheroe()
    {
        /** 
         *   Relacionamos la tabla intermedia Superheroe M ----> M User
         *   Tabla intermedia superheroe_user
         */
        return $this->belongsToMany(Superheroe::class, 'superheroe_user');
    }
}
