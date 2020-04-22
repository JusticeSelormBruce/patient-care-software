@extends('layouts.patient')
@section('render')
    <style>
        .card {
            height: 35vh !important;
            color: white;
        }

    </style>
    <div class="container-fluid pt-5">
        <div class="jumbotron pt-2">


            <div class="row">
                <div class="col-6">
                    <div class="card bg-secondary">
                        <div class="card-header">
                            Medical Prescriptions
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="row">
                                <div class="mx-auto w-50">
                                    @include('Patient.my_prescriptions')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card bg-success">
                        <div class="card-header">
                            Visits
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="row">
                                <div class="mx-auto w-50">
                                    @include('Patient.my_past_visits')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="card bg-info">
                        <div class="card-header">
                            Appointments
                        </div>
                        <hr>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    @include('Patient.appointment.past')
                                </div>
                                <div class="col-6">
                                    @if(session()->has('msg'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <div class="row">
                                                <div class="mx-auto w-50">
                                                    {{session()->get('msg')}}
                                                </div>
                                            </div>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    @include('Patient.appointment.new')
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-6">
                    <div class="card bg-default">
                        <div class="card-header">
                         My Laboratory Results
                        </div>
                        <hr> <div class="card-body">
                            <div class="row">
                                <div class="mx-auto w-50">
                                    @include('Patient.my_lab_results')
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection