@extends('layouts.app')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <div class="login-logo">
                <a href="#">
                    {{ trans('panel.site_title') }}
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <p class="login-box-msg">COMPLETE YOUR PROFILE</p>
                <form method="POST" action="{{ route('profile.store') }}">
                    {{ csrf_field() }}

                    <div>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="mobile">{{ trans('cruds.user.fields.mobile') }}</label>
                            <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="{{ old('mobile', '') }}">
                            @if($errors->has('mobile'))
                                <span class="text-danger">{{ $errors->first('mobile') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.mobile_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.user.fields.gender') }}</label>
                            @foreach(App\Models\User::GENDER_RADIO as $key => $label)
                                <div class="form-check {{ $errors->has('gender') ? 'is-invalid' : '' }}" style="display: inline-block;">
                                    <input class="form-check-input" type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gender_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('gender'))
                                <span class="text-danger">{{ $errors->first('gender') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.gender_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="date_of_birth">{{ trans('cruds.user.fields.date_of_birth') }}</label>
                            <input class="form-control date {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}" type="text" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}">
                            @if($errors->has('date_of_birth'))
                                <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.date_of_birth_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="age">{{ trans('cruds.user.fields.age') }}</label>
                            <input class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" type="text" name="age" id="age" value="{{ old('age', '') }}">
                            @if($errors->has('age'))
                                <span class="text-danger">{{ $errors->first('age') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.age_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="weight">{{ trans('cruds.user.fields.weight') }}</label>
                            <input class="form-control {{ $errors->has('weight') ? 'is-invalid' : '' }}" type="text" name="weight" id="weight" value="{{ old('weight', '') }}">
                            @if($errors->has('weight'))
                                <span class="text-danger">{{ $errors->first('weight') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.weight_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="height">{{ trans('cruds.user.fields.height') }}</label>
                            <input class="form-control {{ $errors->has('height') ? 'is-invalid' : '' }}" type="text" name="height" id="height" value="{{ old('height', '') }}">
                            @if($errors->has('height'))
                                <span class="text-danger">{{ $errors->first('height') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.height_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="address">{{ trans('cruds.user.fields.address') }}</label>
                            <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                            @if($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.address_helper') }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">
                                {{ trans('global.register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
