<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarcaCelular extends Model
{
    protected $table = 'marca_celulars'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombre-marca',
        'descripcion',
        'precio',
    ];

   
}