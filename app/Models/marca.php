<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marca extends Model
{
    use HasFactory;
    public $table = 'marcas';
    protected $primaryKey = 'IdMarcas';
    protected $fillable = ['Nombre'];
}
