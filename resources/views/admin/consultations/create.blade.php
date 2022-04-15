@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.consultation.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.consultations.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="patient_id">{{ trans('cruds.consultation.fields.patient') }}</label>
                    <select class="form-control select2 {{ $errors->has('patient') ? 'is-invalid' : '' }}" name="patient_id" id="patient_id" required>
                        @foreach($patients as $id => $entry)
                            <option value="{{ $id }}" {{ old('patient_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('patient'))
                        <span class="text-danger">{{ $errors->first('patient') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.consultation.fields.patient_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="symptom_one">{{ trans('cruds.consultation.fields.symptom_one') }}</label>
                    <input class="form-control {{ $errors->has('symptom_one') ? 'is-invalid' : '' }}" type="text" name="symptom_one" id="symptom_one" value="{{ old('symptom_one', '') }}" required>
                    @if($errors->has('symptom_one'))
                        <span class="text-danger">{{ $errors->first('symptom_one') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.consultation.fields.symptom_one_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="symptom_two">{{ trans('cruds.consultation.fields.symptom_two') }}</label>
                    <input class="form-control {{ $errors->has('symptom_two') ? 'is-invalid' : '' }}" type="text" name="symptom_two" id="symptom_two" value="{{ old('symptom_two', '') }}" required>
                    @if($errors->has('symptom_two'))
                        <span class="text-danger">{{ $errors->first('symptom_two') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.consultation.fields.symptom_two_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="symptom_three">{{ trans('cruds.consultation.fields.symptom_three') }}</label>
                    <input class="form-control {{ $errors->has('symptom_three') ? 'is-invalid' : '' }}" type="text" name="symptom_three" id="symptom_three" value="{{ old('symptom_three', '') }}">
                    @if($errors->has('symptom_three'))
                        <span class="text-danger">{{ $errors->first('symptom_three') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.consultation.fields.symptom_three_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="symptom_four">{{ trans('cruds.consultation.fields.symptom_four') }}</label>
                    <input class="form-control {{ $errors->has('symptom_four') ? 'is-invalid' : '' }}" type="text" name="symptom_four" id="symptom_four" value="{{ old('symptom_four', '') }}">
                    @if($errors->has('symptom_four'))
                        <span class="text-danger">{{ $errors->first('symptom_four') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.consultation.fields.symptom_four_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="doctor_id">{{ trans('cruds.consultation.fields.doctor') }}</label>
                    <select class="form-control select2 {{ $errors->has('doctor') ? 'is-invalid' : '' }}" name="doctor_id" id="doctor_id" required>
                        @foreach($doctors as $id => $entry)
                            <option value="{{ $id }}" {{ old('doctor_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('doctor'))
                        <span class="text-danger">{{ $errors->first('doctor') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.consultation.fields.doctor_helper') }}</span>
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
