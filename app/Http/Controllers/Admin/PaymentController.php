<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPaymentRequest;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Payment;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payments = Payment::with(['patient'])->get();

        $users = User::get();

        return view('admin.payments.index', compact('payments', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('payment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patients = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.payments.create', compact('patients'));
    }

    public function store(StorePaymentRequest $request)
    {
        $payment = Payment::create($request->all());

        return redirect()->route('admin.payments.index');
    }

    public function edit(Payment $payment)
    {
        abort_if(Gate::denies('payment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patients = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment->load('patient');

        return view('admin.payments.edit', compact('patients', 'payment'));
    }

    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $payment->update($request->all());

        return redirect()->route('admin.payments.index');
    }

    public function show(Payment $payment)
    {
        abort_if(Gate::denies('payment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment->load('patient');

        return view('admin.payments.show', compact('payment'));
    }

    public function destroy(Payment $payment)
    {
        abort_if(Gate::denies('payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment->delete();

        return back();
    }

    public function massDestroy(MassDestroyPaymentRequest $request)
    {
        Payment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
