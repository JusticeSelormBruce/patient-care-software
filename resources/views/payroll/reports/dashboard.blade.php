@extends('layouts.payroll')
@section('render')
    <style>
        img{
            width: 120px;
            height: 120px;
        }
    </style>
    <div class="container pt-5">
        <div class="jumbotron pt-1">
            <div class="row">
                <div class="lead text-info">
                    Reports
                </div>
            </div>
            @if(session()->has('msg'))

                <div class=" w-100">
                    <div class="alert alert-info small" >
                        {{session()->get('msg')}}
                    </div>
                </div>

            @endif
            <form action="/get-payroll-report" method="post">
                <div class="row pt-5">
                    <div class="ml-auto w-75">
                        <div class="input-group-sm">
                            <span>Get Report between selected date and Today</span>
                            <div class="pt-3"></div>
                            <input type="date" class="w-75 form-control" name="date">
                        </div>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="mx-auto mx-5">
                        <button class="btn btn-outline-dark btn-sm"> Get Report</button>
                    </div>
                </div>
                @csrf
            </form>

        </div>
    </div>

@endsection