<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class municipio extends Model
{
    protected $table = 'municipio';

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'id_departamento', 'id_departamento');
    }

    public function direcciones()
    {
        return $this->hasMany(Direccion::class, 'id_municipio', 'id_municipio');
    }
}
