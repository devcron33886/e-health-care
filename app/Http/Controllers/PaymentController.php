<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

class PaymentController extends Controller
{
    public function index()
    {
        $payments=Payment::with('patient')->get();
        return view('patient.payments.index',compact('payments'));
    }

    public function create()
    {
        return view('patient.payments.create');
    }
    public function initialize()
    {
        $reference = Flutterwave::generateReference();
        $data = [
            'amount' => request()->amount,
            'email' => auth()->user()->email,
            'tx_ref' => $reference,
            'currency' => 'RWF',
            'country' => 'RW',
            'redirect_url' => route('callback'),
            'customer' =>[
                'email' => auth()->user()->email,
                'mobile' => auth()->user()->mobile,
                'name' => auth()->user()->name,
            ],
            "customizations" => [
                "title" => 'Payment of consultation fees on '.config('app.name'),
                "description" => "These are the fees that are payed every month in order to tal to the doctor."
            ]
        ];

        $payment = Flutterwave::initializePayment($data);


        if ($payment['status'] !== 'success') {
            // notify something went wrong
            return redirect()->route('failed');
        }

        return redirect($payment['data']['link']);
    }
    public function callback(PaymentRequest $request)
    {
        $status = request()->status;
        if ($status == 'success') {
            $transactionID = Flutterwave::getTransactionIDFromCallback();
            $infos = Flutterwave::verifyTransaction($transactionID);
            if ($infos['status'] == 'success') {
                $order = Payment::create($request->all());
                return  redirect()->route('payments.success');
            } else {
                return redirect()->route('failed');
            }
        }
        elseif($status == 'cancelled') {
            return redirect()->route('payments.cancelled');
        }
        return redirect()->route('payments.success');
    }
}
