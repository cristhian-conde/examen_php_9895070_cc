<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $table = 'libros';

    protected $fillable =[
        'titulo',
        'autor_id',
        'lote',
        'description'
    ];

    /**
     * Get the autor that owns the Libro
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function autor()
    {
        return $this->belongsTo(Autor::class,'id');
    }
}
