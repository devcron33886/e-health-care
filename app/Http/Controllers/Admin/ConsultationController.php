<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyConsultationRequest;
use App\Http\Requests\StoreConsultationRequest;
use App\Http\Requests\UpdateConsultationRequest;
use App\Models\Consultation;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConsultationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('consultation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $consultations = Consultation::with(['patient', 'doctor'])->get();
        $users=User::all();

        return view('admin.consultations.index', compact('consultations','users'));
    }

    public function create()
    {
        abort_if(Gate::denies('consultation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patients = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $doctors = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.consultations.create', compact('doctors', 'patients'));
    }

    public function store(StoreConsultationRequest $request)
    {
        $consultation = Consultation::create($request->all());

        return redirect()->route('admin.consultations.index');
    }

    public function edit(Consultation $consultation)
    {
        abort_if(Gate::denies('consultation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patients = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $doctors = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $consultation->load('patient', 'doctor', 'created_by');

        return view('admin.consultations.edit', compact('consultation', 'doctors', 'patients'));
    }

    public function update(UpdateConsultationRequest $request, Consultation $consultation)
    {
        $consultation->update($request->all());

        return redirect()->route('admin.consultations.index');
    }

    public function show(Consultation $consultation)
    {
        abort_if(Gate::denies('consultation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $consultation->load('patient', 'doctor', 'created_by');

        return view('admin.consultations.show', compact('consultation'));
    }

    public function destroy(Consultation $consultation)
    {
        abort_if(Gate::denies('consultation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $consultation->delete();

        return back();
    }

    public function massDestroy(MassDestroyConsultationRequest $request)
    {
        Consultation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
