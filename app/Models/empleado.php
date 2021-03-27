<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{
    use HasFactory;
    public $table = 'empleado';
    protected $primaryKey = 'IdEmpleado';
    protected $fillable = [
        'NombreCompleto', 
        'Estado', 
        'email', 
        'password'
    ];
}
