<?php

namespace App\Http\Controllers\Admin;

use App\Models\Appointment;
use App\Models\Payment;
use App\Models\User;

class HomeController
{
    public function index()
    {
        $doctors=User::all();
        $paid=Payment::where('status',1)->get();
        $unpaid=Payment::where('status',0)->get();
        $appointment=Appointment::all();
        $appointments=Appointment::orderBy('id','DESC')->take(4)->get();
        $pending_appointments=Appointment::where('appointment_status',0)->get();
        $completed_appointments=Appointment::where('appointment_status',1)->get();
        $cancelled_appointments=Appointment::where('appointment_status',2)->get();
        $payments=Payment::orderBy('id','DESC')->take(4)->get();
        $patients=User::whereHas('roles',function($q){
            return $q->where('id',2);
        });
        return view('home',compact('payments','appointment','doctors','paid','unpaid','appointments','pending_appointments','completed_appointments','cancelled_appointments','patients'));
    }
}
