<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function getAllPatients()
    {
        $patients = Patient::all(); // Obtiene todos los pacientes de la base de datos

        if ($patients->isEmpty()) {
            return response()->json([
                'message' => 'No patients found',
                'data' => [],
            ], 200);
        }

        return response()->json([
            'success' => true,
            'message' => 'List of all patients',
            'patients' => $patients
        ], 200);
    }
}
