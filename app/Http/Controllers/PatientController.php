<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\Mail;

class PatientController extends Controller {
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'document_photo' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $photoPath = $request->file('document_photo')->store('documents', 'public');

        $patient = Patient::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'document_photo' => $photoPath
        ]);

        Mail::raw('Thank you for registering!', function ($message) use ($patient) {
            $message->to($patient->email)
                ->subject('Patient Registration Confirmation');
        });

        return response()->json(['message' => 'Patient registered successfully!', 'patient' => $patient], 201);
    }
}
