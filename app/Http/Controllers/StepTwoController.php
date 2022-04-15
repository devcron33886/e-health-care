<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProfileRequest;

class StepTwoController extends Controller
{
    public function create()
    {
        return view('auth.step-two');
    }

    public function store(StoreProfileRequest $request)
    {
        auth()->user()->update($request->all());
        return redirect()->route('payment.create');
    }
}
