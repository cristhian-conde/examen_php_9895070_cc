<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamos extends Model
{
    use HasFactory;

    protected $table = 'prestamos';

    public function libro() {
        return $this->belongsTo(Libro::class, 'id');
    }

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'id');
    }
}
