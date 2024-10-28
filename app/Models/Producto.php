<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'precio', 'stock', 'subcategoria_id', 'imagen'];

    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class);
    }

    // Modelo Producto
    public function tallas()
    {
        return $this->hasManyThrough(Talla::class, Subcategoria::class, 'id', 'subcategoria_id', 'subcategoria_id', 'id');
    }

}
