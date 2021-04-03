<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{
    use HasFactory;
    public $table = 'proveedor';
    protected $primaryKey = 'IdProveedor';
    protected $fillable = ['Nombre','Contacto','TelefonoContacto','Estado'];
}
