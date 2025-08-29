<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SolicitudController extends Controller
{
    public function index()
    {
        $solicitudes = Auth::user()->solicitudes()->latest()->get();
        
        return response()->json([
            'status' => 'success',
            'data' => $solicitudes
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cedula_solicitante' => 'required|string|max:20',
            'nombre_solicitante' => 'required|string|max:100',
            'apellidos_solicitante' => 'required|string|max:100',
            'email_solicitante' => 'required|email',
            'nombre_persona' => 'required|string|max:100',
            'primer_apellido' => 'required|string|max:50',
            'fecha_nacimiento' => 'required|date',
            'lugar_nacimiento' => 'required|string|max:200',
            'provincia_nacimiento' => 'required|string|max:50',
            'distrito_nacimiento' => 'required|string|max:50',
            'sexo' => 'required|in:M,F',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Datos inválidos',
                'errors' => $validator->errors()
            ], 422);
        }

        $solicitud = Auth::user()->solicitudes()->create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Solicitud creada exitosamente',
            'data' => $solicitud
        ], 201);
    }

    public function show($id)
    {
        $solicitud = Auth::user()->solicitudes()->findOrFail($id);
        
        return response()->json([
            'status' => 'success',
            'data' => $solicitud
        ]);
    }

    public function update(Request $request, $id)
    {
        $solicitud = Auth::user()->solicitudes()->findOrFail($id);
        
        if ($solicitud->estado !== 'pendiente') {
            return response()->json([
                'status' => 'error',
                'message' => 'No se puede modificar una solicitud en proceso'
            ], 400);
        }

        $solicitud->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Solicitud actualizada exitosamente',
            'data' => $solicitud
        ]);
    }

    public function destroy($id)
    {
        $solicitud = Auth::user()->solicitudes()->findOrFail($id);
        
        if ($solicitud->estado !== 'pendiente') {
            return response()->json([
                'status' => 'error',
                'message' => 'No se puede eliminar una solicitud en proceso'
            ], 400);
        }

        $solicitud->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Solicitud eliminada exitosamente'
        ]);
    }
}