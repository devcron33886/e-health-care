<?php

namespace App\Http\Requests;

use App\Models\Prescription;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePrescriptionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('prescription_edit');
    }

    public function rules()
    {
        return [
            'patient_id' => [
                'required',
                'integer',
            ],
            'medic_one' => [
                'string',
                'required',
            ],
            'medic_two' => [
                'string',
                'required',
            ],
            'medic_three' => [
                'string',
                'nullable',
            ],
            'medic_four' => [
                'string',
                'nullable',
            ],
            'doctor_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
