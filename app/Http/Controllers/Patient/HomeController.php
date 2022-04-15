<?php

namespace App\Http\Controllers\Patient;

use App\Models\Appointment;
use App\Models\Payment;
use App\Models\Prescription;
use App\Models\User;

class HomeController
{
    public function index()
    {
        $doctors=User::whereHas('roles',function ($q){
           return $q->where('title','Admin');
        });
        $payment=Payment::where('patient_id',auth()->user()->id);
        $prescription=Prescription::where('patient_id',auth()->user()->id);
        $appointment=Appointment::where('patient_id',auth()->user()->id);
        $appointments=Appointment::where('patient_id',auth()->user()->id)->get();
        $payments=Payment::where('patient_id',auth()->user()->id)->get();
        return view('patient.home',compact('doctors','payment','prescription','appointment','appointments','payments'));
    }
}
