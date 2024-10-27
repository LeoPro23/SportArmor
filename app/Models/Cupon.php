<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    use HasFactory;

    protected $table = 'cupones'; // Asegúrate de que el nombre de la tabla sea correcto

    protected $fillable = ['codigo', 'descuento', 'fecha_expiracion'];
}
