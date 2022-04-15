<?php

namespace App\Http\Requests;

use App\Models\Payment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('payment_edit');
    }

    public function rules()
    {
        return [
            'amount' => [
                'required',
            ],
            'mobile' => [
                'string',
                'required',
            ],
            'start_from' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'active_until' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
