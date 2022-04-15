@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.prescription.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.prescriptions.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.prescription.fields.id') }}
                        </th>
                        <td>
                            {{ $prescription->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.prescription.fields.patient') }}
                        </th>
                        <td>
                            {{ $prescription->patient->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.prescription.fields.medic_one') }}
                        </th>
                        <td>
                            {{ $prescription->medic_one }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.prescription.fields.medic_two') }}
                        </th>
                        <td>
                            {{ $prescription->medic_two }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.prescription.fields.medic_three') }}
                        </th>
                        <td>
                            {{ $prescription->medic_three }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.prescription.fields.medic_four') }}
                        </th>
                        <td>
                            {{ $prescription->medic_four }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.prescription.fields.doctor') }}
                        </th>
                        <td>
                            {{ $prescription->doctor->name ?? '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.prescriptions.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
