@extends('layouts.patient')


@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('patient.home.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $doctors->count() }}</h3>

                            <p>Total Users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $payment->count() }}</h3>

                            <p>Total payment</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $prescription->count() }}</h3>

                            <p>Total prescription</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $appointment->count() }}</h3>

                            <p>Total Appointments</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>


        </div>
        <div class="row">
            <section class="col-lg-6 connectedSortable">
                <div class="card">
                    <div class="card-header text-center">My Appointment</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Date</td>

                                    <td>Status</td>
                                </tr>

                                </thead>
                                <tbody>
                                @foreach ($appointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->patient->name }}</td>
                                        <td>{{ $appointment->appointment_date }}</td>
                                        <td>
                                            @if ($appointment->appointment_status == 0)
                                                <button class="btn btn-warning">Pending</button>
                                            @elseif ($appointment->appointment_status == 1)
                                                <button class="btn btn-success">Completed</button>
                                            @elseif ($appointment->appointment_status == 2)
                                                <button class="btn btn-danger">Cancelled</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <section class="col-lg-6 connectedSortable">
                <div class="card">
                    <div class="card-header text-center">May payments</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Start From</td>
                                    <td>Valid Until</td>

                                    <td>Status</td>
                                </tr>

                                </thead>
                                <tbody>
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{ $payment->patient->name }}</td>
                                        <td>{{ $payment->start_from }}</td>
                                        <td>{{ $payment->valid_until }}</td>
                                        <td>
                                            @if ($payment->status == 0)
                                                <button class="btn btn-warning">Pending</button>
                                            @elseif ($payment->status == 1)
                                                <button class="btn btn-success">Completed</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection
