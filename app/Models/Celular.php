<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Celular extends Model
{

    protected $table= 'celulars';

    protected $fillable = [
        'Nombre_celular',
        'descripcion',
        'precio_unitario',
    ];
}
