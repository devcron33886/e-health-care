<?php

namespace App\Http\Requests;

use App\Models\Consultation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateConsultationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('consultation_edit');
    }

    public function rules()
    {
        return [
            'patient_id' => [
                'required',
                'integer',
            ],
            'symptom_one' => [
                'string',
                'required',
            ],
            'symptom_two' => [
                'string',
                'required',
            ],
            'symptom_three' => [
                'string',
                'nullable',
            ],
            'symptom_four' => [
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
