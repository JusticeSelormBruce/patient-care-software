@extends('layouts.payroll')
@section('render')
    <style>
        img {
            width: 120px;
            height: 120px;
        }
        table,tr,td,th{
            font-family: -apple-system;
            font-size: small;
        }
    </style>
    <div class="container-fluid pt-5">
        <div class="jumbotron pt-3">
            <div class="lead">
               Payment Details   Dashboard
            </div>
            <div class="row">
                <div class="ml-auto mx-5">
                    @include('payroll.payment.add')
                </div>
            </div>

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
            @endif
            @include('payroll.payment.list')
        </div>
    </div>
@endsection