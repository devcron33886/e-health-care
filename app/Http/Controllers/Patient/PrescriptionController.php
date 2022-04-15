<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Prescription;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class PrescriptionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('prescription_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prescriptions = Prescription::where('patient_id',auth()->user()->id)->get();



        return view('patient.prescriptions.index', compact('prescriptions'));
    }


    public function show(Prescription $prescription)
    {
        abort_if(Gate::denies('prescription_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prescription->load('patient', 'doctor');

        return view('admin.prescriptions.show', compact('prescription'));
    }


}
