<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\PatientRegisteredMail;

class PatientController extends Controller
{
    public function getAllPatients(): \Illuminate\Http\JsonResponse{
        $patients = Patient::all();

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

    public function createPatient(Request $request): \Illuminate\Http\JsonResponse{
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:patients,email',
            'address' => 'required|string|min:5|max:25',
            'phone' => 'required|string|min:8|max:12',
            'document_photo' => 'required|string|max:15' // <- TODO: Cargar una imagen
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 400);
        }

        $patient = Patient::create($validator->valid());

        // Enviar email de confirmación de manera asíncrona
        Mail::to($patient->email)->send(new PatientRegisteredMail($patient));

        return response()->json([
            'message' => 'Patient registered successfully!',
            'patient' => $validator->valid()
        ], 201);
    }
}
