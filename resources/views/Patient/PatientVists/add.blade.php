@extends('layouts.Receptionist')
@section('render')
    <style>
        img {
            width: 150px !important;
            height: 150px !important;
        }
    </style>
    <div class="container-fluid pt-5">
        <div class="jumbotron pt-1">
        <div class="row">
            @if(session()->has('msg1'))
                <div class="alert alert-success form-control">
                    {{session()->get('msg1')}}
                </div>
            @endif
        </div>
        <form action="/save-patient-visit-details" method="post">
            @include('Patient.PatientVists.form')
            <div class="row">
                <div class="mx-auto">
                    <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                </div>
            </div>
            @csrf
        </form>
    </div>
    </div>
@endsection


