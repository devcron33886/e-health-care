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
            <div class="card-body login-card-body">
                <p class="login-box-msg">Pay for Consultation</p>
                <form method="POST" action="{{ route('pay') }}">
                    @csrf

                    <div>
                        <input type="hidden" name="patient_id" value="{{ auth()->user()->id }}">

                        <div class="form-group">
                            <label for="Amount">Amount to be Payed In RwF</label>
                            <input type="number" class="form-control" id="amount"
                                   value="300" name="amount" readonly>
                        </div>
                        <input type="hidden" name="mobile" value="{{ auth()->user()->mobile }}">
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">
                                Continue to pay
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
