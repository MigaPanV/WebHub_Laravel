<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    // Nombre exacto de la tabla en MySQL
    protected $table = 'estudiantes';

    // Clave primaria de la tabla
    protected $primaryKey = 'ID';

    // El documento se ingresa manualmente, no es autoincremental
    public $incrementing = false;

    // El tipo de dato de ID es entero
    protected $keyType = 'int';

    // La tabla antigua no tiene created_at ni updated_at
    public $timestamps = false;

    // Campos que Laravel permitirá insertar o actualizar
    protected $fillable = [
        'ID',
        'nombre',
        'apellido',
        'edad',
        'fecha',
        'correo',
        'programa'
    ];
}