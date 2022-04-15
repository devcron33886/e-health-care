<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'amount' =>[
                'required'
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
