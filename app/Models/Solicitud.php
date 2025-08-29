<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitudes';

    protected $fillable = [
        'numero_solicitud',
        'cedula_solicitante',
        'nombre_solicitante',
        'apellidos_solicitante',
        'telefono_solicitante',
        'email_solicitante',
        'cedula_persona',
        'nombre_persona',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'fecha_nacimiento',
        'hora_nacimiento',
        'lugar_nacimiento',
        'provincia_nacimiento',
        'distrito_nacimiento',
        'corregimiento_nacimiento',
        'nombre_padre',
        'apellidos_padre',
        'cedula_padre',
        'nacionalidad_padre',
        'nombre_madre',
        'apellidos_madre',
        'cedula_madre',
        'nacionalidad_madre',
        'sexo',
        'nacionalidad',
        'estado_civil_padres',
        'motivo_solicitud',
        'estado',
        'observaciones',
        'user_id'
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
        'hora_nacimiento' => 'datetime:H:i',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Generar número de solicitud automático
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($solicitud) {
            $solicitud->numero_solicitud = 'SOL-' . str_pad(
                static::count() + 1, 
                3, 
                '0', 
                STR_PAD_LEFT
            ) . '-' . date('Y');
        });
    }
}