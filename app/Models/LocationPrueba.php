<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationPrueba extends Model
{
    use HasFactory;
    
    protected $table = 'locationsPrueba';

    protected $fillable = [
        'Rpu',
        'CveTarea',
        'CveZona',
        'Latitud',
        'Longitud',
        'Altitud',
        'Fecha',
        'Tipo',
    ];

    public function locationsPrueba(): BelongsTo
    {
       return $this->belongsTo(locationsPrueba::class);
    }
}
