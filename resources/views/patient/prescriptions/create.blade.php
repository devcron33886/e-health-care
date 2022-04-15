@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.prescription.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.prescriptions.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="patient_id">{{ trans('cruds.prescription.fields.patient') }}</label>
                    <select class="form-control select2 {{ $errors->has('patient') ? 'is-invalid' : '' }}" name="patient_id" id="patient_id" required>
                        @foreach($patients as $id => $entry)
                            <option value="{{ $id }}" {{ old('patient_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('patient'))
                        <span class="text-danger">{{ $errors->first('patient') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.prescription.fields.patient_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="medic_one">{{ trans('cruds.prescription.fields.medic_one') }}</label>
                    <input class="form-control {{ $errors->has('medic_one') ? 'is-invalid' : '' }}" type="text" name="medic_one" id="medic_one" value="{{ old('medic_one', '') }}" required>
                    @if($errors->has('medic_one'))
                        <span class="text-danger">{{ $errors->first('medic_one') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.prescription.fields.medic_one_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="medic_two">{{ trans('cruds.prescription.fields.medic_two') }}</label>
                    <input class="form-control {{ $errors->has('medic_two') ? 'is-invalid' : '' }}" type="text" name="medic_two" id="medic_two" value="{{ old('medic_two', '') }}" required>
                    @if($errors->has('medic_two'))
                        <span class="text-danger">{{ $errors->first('medic_two') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.prescription.fields.medic_two_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="medic_three">{{ trans('cruds.prescription.fields.medic_three') }}</label>
                    <input class="form-control {{ $errors->has('medic_three') ? 'is-invalid' : '' }}" type="text" name="medic_three" id="medic_three" value="{{ old('medic_three', '') }}">
                    @if($errors->has('medic_three'))
                        <span class="text-danger">{{ $errors->first('medic_three') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.prescription.fields.medic_three_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="medic_four">{{ trans('cruds.prescription.fields.medic_four') }}</label>
                    <input class="form-control {{ $errors->has('medic_four') ? 'is-invalid' : '' }}" type="text" name="medic_four" id="medic_four" value="{{ old('medic_four', '') }}">
                    @if($errors->has('medic_four'))
                        <span class="text-danger">{{ $errors->first('medic_four') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.prescription.fields.medic_four_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="doctor_id">{{ trans('cruds.prescription.fields.doctor') }}</label>
                    <select class="form-control select2 {{ $errors->has('doctor') ? 'is-invalid' : '' }}" name="doctor_id" id="doctor_id" required>
                        @foreach($doctors as $id => $entry)
                            <option value="{{ $id }}" {{ old('doctor_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('doctor'))
                        <span class="text-danger">{{ $errors->first('doctor') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.prescription.fields.doctor_helper') }}</span>
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
