<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Superheroe extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function user()
    {
        /** 
         *   Relacionamos la tabla intermedia User M ----> M Superheroe 
         *   Tabla intermedia superheroe_user
         */
        return $this->belongsTo(User::class, 'superheroe_user', "id");
    }
}
