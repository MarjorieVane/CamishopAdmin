<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedidos extends Model
{
    use HasFactory;
    public $table = 'venta_enc';
    protected $primaryKey = 'IdVenta_enc';
    protected $fillable = [
        'Fecha_venta', 
        'Fecha_requiere', 
        'Persona_recibe', 
        'Telefono_contacto',
        'Observaciones',
        'IdMoneda'

    ];
}
