@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.consultation.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.consultations.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.consultation.fields.id') }}
                        </th>
                        <td>
                            {{ $consultation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.consultation.fields.patient') }}
                        </th>
                        <td>
                            {{ $consultation->patient->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.consultation.fields.symptom_one') }}
                        </th>
                        <td>
                            {{ $consultation->symptom_one }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.consultation.fields.symptom_two') }}
                        </th>
                        <td>
                            {{ $consultation->symptom_two }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.consultation.fields.symptom_three') }}
                        </th>
                        <td>
                            {{ $consultation->symptom_three }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.consultation.fields.symptom_four') }}
                        </th>
                        <td>
                            {{ $consultation->symptom_four }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.consultation.fields.doctor') }}
                        </th>
                        <td>
                            {{ $consultation->doctor->name ?? '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.consultations.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
