@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.payment.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.payments.update", [$payment->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="patient_id">{{ trans('cruds.payment.fields.patient') }}</label>
                    <select class="form-control select2 {{ $errors->has('patient') ? 'is-invalid' : '' }}" name="patient_id" id="patient_id">
                        @foreach($patients as $id => $entry)
                            <option value="{{ $id }}" {{ (old('patient_id') ? old('patient_id') : $payment->patient->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('patient'))
                        <span class="text-danger">{{ $errors->first('patient') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.payment.fields.patient_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="amount">{{ trans('cruds.payment.fields.amount') }}</label>
                    <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $payment->amount) }}" step="0.01" required>
                    @if($errors->has('amount'))
                        <span class="text-danger">{{ $errors->first('amount') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.payment.fields.amount_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="mobile">{{ trans('cruds.payment.fields.mobile') }}</label>
                    <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="{{ old('mobile', $payment->mobile) }}" required>
                    @if($errors->has('mobile'))
                        <span class="text-danger">{{ $errors->first('mobile') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.payment.fields.mobile_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="start_from">{{ trans('cruds.payment.fields.start_from') }}</label>
                    <input class="form-control date {{ $errors->has('start_from') ? 'is-invalid' : '' }}" type="text" name="start_from" id="start_from" value="{{ old('start_from', $payment->start_from) }}">
                    @if($errors->has('start_from'))
                        <span class="text-danger">{{ $errors->first('start_from') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.payment.fields.start_from_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="active_until">{{ trans('cruds.payment.fields.active_until') }}</label>
                    <input class="form-control date {{ $errors->has('active_until') ? 'is-invalid' : '' }}" type="text" name="active_until" id="active_until" value="{{ old('active_until', $payment->active_until) }}" required>
                    @if($errors->has('active_until'))
                        <span class="text-danger">{{ $errors->first('active_until') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.payment.fields.active_until_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.payment.fields.status') }}</label>
                    <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                        <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Payment::STATUS_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('status', $payment->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('status'))
                        <span class="text-danger">{{ $errors->first('status') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.payment.fields.status_helper') }}</span>
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
