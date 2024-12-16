<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valoracion extends Model
{
    use HasFactory;

    protected $table = 'valoraciones';
    protected $fillable = ['valor'];

    public function chats()
    {
        return $this->hasMany(Chat::class, 'valoracion_id');
    }
}
