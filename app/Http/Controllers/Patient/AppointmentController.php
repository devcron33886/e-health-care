<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class AppointmentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('appointment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appointments = Appointment::where('patient_id',auth()->user()->id)->get();

        return view('patient.appointments.index', compact('appointments'));
    }

    public function show(Appointment $appointment)
    {
        abort_if(Gate::denies('appointment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appointment->load('patient', 'doctor');

        return view('patient.appointments.show', compact('appointment'));
    }


}
