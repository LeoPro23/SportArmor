<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talla extends Model
{
    use HasFactory;

    protected $fillable = ['talla', 'subcategoria_id'];

    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class);
    }
}
