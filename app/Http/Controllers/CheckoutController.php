<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function wrong()
    {
        return view('patient.payments.fail');
    }

    public function cancel()
    {
        return view('patient.payments.called');
    }
    public function success()
    {
        return view('patient.payments.success');
    }
}
