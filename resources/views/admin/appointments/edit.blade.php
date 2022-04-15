@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.appointment.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.appointments.update", [$appointment->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="patient_id">{{ trans('cruds.appointment.fields.patient') }}</label>
                    <select class="form-control select2 {{ $errors->has('patient') ? 'is-invalid' : '' }}" name="patient_id" id="patient_id" required>
                        @foreach($patients as $id => $entry)
                            <option value="{{ $id }}" {{ (old('patient_id') ? old('patient_id') : $appointment->patient->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('patient'))
                        <span class="text-danger">{{ $errors->first('patient') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.appointment.fields.patient_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="appointment_date">{{ trans('cruds.appointment.fields.appointment_date') }}</label>
                    <input class="form-control date {{ $errors->has('appointment_date') ? 'is-invalid' : '' }}" type="text" name="appointment_date" id="appointment_date" value="{{ old('appointment_date', $appointment->appointment_date) }}" required>
                    @if($errors->has('appointment_date'))
                        <span class="text-danger">{{ $errors->first('appointment_date') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.appointment.fields.appointment_date_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required">{{ trans('cruds.appointment.fields.appointment_status') }}</label>
                    <select class="form-control {{ $errors->has('appointment_status') ? 'is-invalid' : '' }}" name="appointment_status" id="appointment_status" required>
                        <option value disabled {{ old('appointment_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Appointment::APPOINTMENT_STATUS_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('appointment_status', $appointment->appointment_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('appointment_status'))
                        <span class="text-danger">{{ $errors->first('appointment_status') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.appointment.fields.appointment_status_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="doctor_id">{{ trans('cruds.appointment.fields.doctor') }}</label>
                    <select class="form-control select2 {{ $errors->has('doctor') ? 'is-invalid' : '' }}" name="doctor_id" id="doctor_id" required>
                        @foreach($doctors as $id => $entry)
                            <option value="{{ $id }}" {{ (old('doctor_id') ? old('doctor_id') : $appointment->doctor->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('doctor'))
                        <span class="text-danger">{{ $errors->first('doctor') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.appointment.fields.doctor_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>



@endsection
