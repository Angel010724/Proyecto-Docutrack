<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificadoController extends Controller
{
    public function descargar($id)
    {
        $solicitud = Auth::user()->solicitudes()->findOrFail($id);
        
        if ($solicitud->estado !== 'aprobado') {
            return response()->json([
                'status' => 'error',
                'message' => 'El certificado aún no está disponible para descarga'
            ], 400);
        }

        $pdf = Pdf::loadView('certificados.pdf', compact('solicitud'));
        
        return $pdf->download('certificado-' . $solicitud->numero_solicitud . '.pdf');
    }

    public function listar()
    {
        $certificados = Auth::user()->solicitudes()
            ->where('estado', 'aprobado')
            ->latest()
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $certificados
        ]);
    }
}