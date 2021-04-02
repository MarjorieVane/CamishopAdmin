<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imagen extends Model
{
    use HasFactory;
    public $table = 'imagenes_prod';
    protected $primaryKey = 'IdImagenes_prod';
    protected $fillable = [
        'IdProducto',
        'RutaImagen',
        'Estado'
    ];
}
