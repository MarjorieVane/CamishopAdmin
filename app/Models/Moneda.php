<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
    use HasFactory;
    public $table = 'moneda';
    protected $primaryKey = 'IdMoneda';
    protected $fillable = ['Descripcion','Simbolo','Estado'];
    public $timestamps = false;
}
