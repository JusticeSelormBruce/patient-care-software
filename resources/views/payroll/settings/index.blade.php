@extends('layouts.payroll')
@section('render')
    <style>
        img{
            width: 120px;
            height: 120px;
        }
    </style>
    <div class="container-fluid pt-5">
        <div class="jumbotron pt-3">
            <div class="lead">
                Overtime Payment Settings
            </div>
            <div class="row">
                <div class="ml-auto mx-5">
                    @include('payroll.settings.add')
                </div>
            </div>

                <div>
                    @include('payroll.settings.list')
                </div>

        </div>

    </div>
@endsection