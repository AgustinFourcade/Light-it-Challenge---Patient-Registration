<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(){
        $this->info('Creating sample users...');
        $this->command->info('Creating sample users...');
        $patients = Patient::all();
        return response()->json(['patients' => $patients], 200);
    }
}
