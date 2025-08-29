<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->string('numero_solicitud')->unique();
            
            // Datos del solicitante
            $table->string('cedula_solicitante');
            $table->string('nombre_solicitante');
            $table->string('apellidos_solicitante');
            $table->string('telefono_solicitante')->nullable();
            $table->string('email_solicitante');
            
            // Datos de la persona del certificado
            $table->string('cedula_persona')->nullable();
            $table->string('nombre_persona');
            $table->string('segundo_nombre')->nullable();
            $table->string('primer_apellido');
            $table->string('segundo_apellido')->nullable();
            $table->date('fecha_nacimiento');
            $table->time('hora_nacimiento')->nullable();
            $table->string('lugar_nacimiento');
            $table->string('provincia_nacimiento');
            $table->string('distrito_nacimiento');
            $table->string('corregimiento_nacimiento')->nullable();
            
            // Datos de los padres
            $table->string('nombre_padre')->nullable();
            $table->string('apellidos_padre')->nullable();
            $table->string('cedula_padre')->nullable();
            $table->string('nacionalidad_padre')->nullable();
            $table->string('nombre_madre')->nullable();
            $table->string('apellidos_madre')->nullable();
            $table->string('cedula_madre')->nullable();
            $table->string('nacionalidad_madre')->nullable();
            
            // Otros datos
            $table->enum('sexo', ['M', 'F']);
            $table->string('nacionalidad')->nullable();
            $table->string('estado_civil_padres')->nullable();
            $table->string('motivo_solicitud')->default('Primera vez');
            
            // Estado de la solicitud
            $table->enum('estado', ['pendiente', 'en_proceso', 'aprobado', 'rechazado'])->default('pendiente');
            $table->text('observaciones')->nullable();
            
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};