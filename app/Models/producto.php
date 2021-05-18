<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;
    public $table = 'producto';
    protected $primaryKey = 'IdProducto';
    protected $fillable = [
        'Nombre', 
        'Descripcion', 
        'PrecioUnitario', 
        'Genero', 
        'Estado', 
        'IdCategoria', 
        'IdMarcas', 
        'IdEmpleado',
        'IdProveedor',
        'IdMoneda'
    ];
}
