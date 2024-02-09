<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
    ];

    /**
     * Get all of the libros for the Libro
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function libros() {
        return $this->hasMany(Libro::class, 'id');
    }
}
