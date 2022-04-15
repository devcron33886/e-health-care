<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:users',
            ],
            'password' => [
                'required',
            ],
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'mobile' => [
                'string',
                'nullable',
            ],
            'date_of_birth' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'age' => [
                'string',
                'nullable',
            ],
            'weight' => [
                'string',
                'nullable',
            ],
            'height' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
        ];
    }
}
