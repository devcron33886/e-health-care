<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPrescriptionRequest;
use App\Http\Requests\StorePrescriptionRequest;
use App\Http\Requests\UpdatePrescriptionRequest;
use App\Models\Prescription;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PrescriptionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('prescription_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prescriptions = Prescription::with(['patient', 'doctor'])->get();

        $users = User::get();

        return view('admin.prescriptions.index', compact('prescriptions', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('prescription_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patients = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $doctors = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.prescriptions.create', compact('doctors', 'patients'));
    }

    public function store(StorePrescriptionRequest $request)
    {
        $prescription = Prescription::create($request->all());

        return redirect()->route('admin.prescriptions.index');
    }

    public function edit(Prescription $prescription)
    {
        abort_if(Gate::denies('prescription_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patients = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $doctors = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $prescription->load('patient', 'doctor');

        return view('admin.prescriptions.edit', compact('doctors', 'patients', 'prescription'));
    }

    public function update(UpdatePrescriptionRequest $request, Prescription $prescription)
    {
        $prescription->update($request->all());

        return redirect()->route('admin.prescriptions.index');
    }

    public function show(Prescription $prescription)
    {
        abort_if(Gate::denies('prescription_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prescription->load('patient', 'doctor');

        return view('admin.prescriptions.show', compact('prescription'));
    }

    public function destroy(Prescription $prescription)
    {
        abort_if(Gate::denies('prescription_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prescription->delete();

        return back();
    }

    public function massDestroy(MassDestroyPrescriptionRequest $request)
    {
        Prescription::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
