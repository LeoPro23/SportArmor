<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'ventas';
    protected $fillable = ['fecha_venta', 'cupon_id', 'total', 'user_id'];

    public function cupon()
    {
        return $this->belongsTo(Cupon::class);
    }

    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
