@extends('layouts.laboratory')
@section('render')
    <style>

        @media only screen and (min-width: 768px) {
            .card {
                height: 25vh !important;
            }
        }

        @media only screen and (max-width: 768px) {

            .card {
                height: auto !important;
            }
        }

        @media only screen and (min-width: 600px) {
            .card {
                height: 25vh !important;
            }
        }
    </style>
    <div class="container-fluid pt-5">
        <div class="jumbotron">
            <div class="row">
                <div class="card w-100">
                    <div class="card-header">Total Incoming Lab Request for Today</div>
                    <div class="card-body">
                        <div class="jumbotron">
                            <div class="row">
                                <div class="col-4"></div>
                                <div class="col-4"><h1>  {{$Total ?? 0}}</h1></div>
                                <div class="col-4">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="card w-100">
                    <div class="card-header">Completed Lab Request For Today</div>
                    <div class="card-body">
                        <div class="jumbotron">
                            <div class="row">
                                <div class="col-4"></div>
                                <div class="col-4"><h1>  {{$completedRequest ?? 0}}</h1></div>
                                <div class="col-4">
                                    <a href="/completed" class="btn btn-primary btn-sm  text-dark"> Completed Lab
                                        Request for
                                        Today</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="card w-100">
                    <div class="card-header">Today's Pending Lab Request</div>
                    <div class="card-body">
                        <div class="jumbotron">
                            <div class="row">
                                <div class="col-4"></div>
                                <div class="col-4"><h1>  {{$TodaysLabRequestTotal ?? 0}}</h1></div>
                                <div class="col-4">
                                    @if($TodaysLabRequestTotal != 0)
                                        <a href="/today-lab-request" class="btn btn-primary btn-sm  text-dark"> View All
                                            Pending Lab
                                            Request</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
