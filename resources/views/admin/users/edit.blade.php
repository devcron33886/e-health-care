@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.users.update", [$user->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
                    @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password">
                    @if($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple required>
                        @foreach($roles as $id => $role)
                            <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || $user->roles->contains($id)) ? 'selected' : '' }}>{{ $role }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('roles'))
                        <span class="text-danger">{{ $errors->first('roles') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
                </div>
                <div class="form-group">
                    <div class="form-check {{ $errors->has('is_active') ? 'is-invalid' : '' }}">
                        <input type="hidden" name="is_active" value="0">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ $user->is_active || old('is_active', 0) === 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">{{ trans('cruds.user.fields.is_active') }}</label>
                    </div>
                    @if($errors->has('is_active'))
                        <span class="text-danger">{{ $errors->first('is_active') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.is_active_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="mobile">{{ trans('cruds.user.fields.mobile') }}</label>
                    <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="{{ old('mobile', $user->mobile) }}">
                    @if($errors->has('mobile'))
                        <span class="text-danger">{{ $errors->first('mobile') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.mobile_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.user.fields.gender') }}</label>
                    @foreach(App\Models\User::GENDER_RADIO as $key => $label)
                        <div class="form-check {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', $user->gender) === (string) $key ? 'checked' : '' }}>
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
                    <input class="form-control date {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}" type="text" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth) }}">
                    @if($errors->has('date_of_birth'))
                        <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.date_of_birth_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="age">{{ trans('cruds.user.fields.age') }}</label>
                    <input class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" type="text" name="age" id="age" value="{{ old('age', $user->age) }}">
                    @if($errors->has('age'))
                        <span class="text-danger">{{ $errors->first('age') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.age_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="weight">{{ trans('cruds.user.fields.weight') }}</label>
                    <input class="form-control {{ $errors->has('weight') ? 'is-invalid' : '' }}" type="text" name="weight" id="weight" value="{{ old('weight', $user->weight) }}">
                    @if($errors->has('weight'))
                        <span class="text-danger">{{ $errors->first('weight') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.weight_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="height">{{ trans('cruds.user.fields.height') }}</label>
                    <input class="form-control {{ $errors->has('height') ? 'is-invalid' : '' }}" type="text" name="height" id="height" value="{{ old('height', $user->height) }}">
                    @if($errors->has('height'))
                        <span class="text-danger">{{ $errors->first('height') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.height_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="address">{{ trans('cruds.user.fields.address') }}</label>
                    <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $user->address) }}">
                    @if($errors->has('address'))
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.address_helper') }}</span>
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
