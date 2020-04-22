@extends('layouts.admin')
@section('render')
    <style>

        h1 {
            font-size: 50pt;
            font-family: Algerian;
        }

        .imgBold {
            width: 110px !important;
            height:110px !important;
        }

        h1 {
            font-size: 50pt !important;
        }
    </style>
    <div class="container-fluid pt-5">
        <div class="jumbotron py-0">
            <div class="jumbotron py-0">
                <div class="row">
                    <div class="mx-auto w-100">
                        <div class="card bg-secondary">
                            <span class="card-header"> Incoming Appointments for Today</span>
                            <div class="ard-body py-3">
                                <div class="row no-gutters mx-5">
                                    <div class="col-6 mx-5"><img src="{{asset('images/appointment.jpg')}}" alt="icon"
                                                                 class="imgBold"></div>
                                    <span class=" py-2"> <h1>{{$Appointments->count()}}</h1></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mx-auto">
                                    @if($Appointments->count()>0)
                                        <a href="/my-appointment-dashboard" class="btn btn-outline-light btn-sm">View
                                            Incoming Appointments
                                            for Today</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="jumbotron py-1">
            <div class="row">
                <div class="mx-auto w-100">
                    <div class="card bg-default">
                        <span class="card-header"> Incoming Lab Results for Today</span>
                        <div class="ard-body py-3">
                            <div class="mx-5">
                                @if($labResults ==  null)
                                    <div class="row no-gutters mx-5">
                                        <div class="col-6 mx-5"><img src="{{asset('images/result.jpg')}}" alt="icon"
                                                                     class="imgBold"></div>
                                        <span class=" py-2">   <h1>0</h1></span>
                                    </div>

                                @else
                                    <div class="row no-gutters mx-5">
                                        <div class="col-6 mx-5"><img src="{{asset('images/result.jpg')}}" alt="icon"
                                                                     class="imgBold"></div>
                                        <span class=" py-5"> <h1>{{$Appointments->count()}}</h1></span>
                                    </div>
                                @endif

                            </div>



                            <div class="row">
                                <div class="mx-auto">
                                    @if(!$labResults == null)
                                        @if($labResults->count() + 1 >0)
                                            <a href="/lab-result-list"
                                               class="btn btn-outline-light btn-sm">View Incoming Lab Results</a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
