@extends('layouts.payroll')
@section('render')
    <style>
        hr {
            margin: 0.4rem;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            #section-to-print, #section-to-print * {
                visibility: visible;
            }

            #section-to-print {
                /*position: absolute;*/
                left: 0;
                top: 0;
                background-color: white !important;
            }

            hr {
                margin: 0.1rem;
            }
        }
    </style>
    <div class="container pt-4">

        <div class="jumbotron pt-1">
            <div class="jumbotron pt-3 w-100 pb-1" id="section-to-print">
                <div class="row">
                    <div class="mx-auto mx-5">
                        @if($data == null)
                        @else
                            <div class="mx-2">
                                <span class="mx-3 text-capitalize pt-1"> {{$data->name}}</span>
                                <img src="{{asset('storage/'.$data->logo)}}" alt="{{Auth::user()->name}}">
                            </div>
                        @endif
                    </div>

                </div>
                <hr>
                <div class="row">
                    <strong>Issued By:</strong> <span class="mx-2 text-capitalize"><u>{{Auth::user()->name}}</u></span>

                </div>
                <div class="row small">
                    <span class="text-info  mr-2">Between</span> <span>({{$date}} - Today)</span>
                </div>
                <hr>
                <hr>
                <div class="row mx-1 text-primary">
                    <div class="col-2"><b>#</b></div>
                    <div class="col-2"><b>Employee Name</b></div>
                    <div class="col-2"><b>Amount</b></div>
                    <div class="col-2"><b>Overtime</b></div>
                    <div class="col-2"><b>Deduction</b></div>
                    <div class="col-2"><b>Date/Time</b></div>
                </div>
                <hr>

                @foreach($result as $list)
                    <div class="row small">
                        <div class="col-2">{{($list->count()) -($list->id -1)}}</div>

                        @foreach($AllUsers as $users)

                                @if($users->id == $list->user_id)
                                <div class="col-2">
                                    {{$users->name}}
                                </div>
                                @endif

                        @endforeach

                        <div class="col-2">{{$list->amount}}</div>
                        <div class="col-2">{{$list->overtime}}</div>
                        <div class="col-2">{{$list->deduction}}</div>
                        <div class="col-2">{{$list->created_at}}</div>

                    </div>

                    <hr>
                @endforeach
                <hr>
                <hr>
                <div class="row text-success">
                    <div class="col-2"></div>
                    <div class="col-2"></div>
                    <div class="col-2">(ghc){{$result1->sum('amount')}}</div>
                    <div class="col-2"></div>
                </div>
            </div>
            <div class="row">
                <div class="mx-auto w-100">
                    <button class="btn btn-outline-dark w-100 btn-sm text-success text-capitalize h6"
                            onclick="window.print()">Print Report for <span
                                class="mx-1 small">({{$date}} - Today)</span></button>
                </div>
            </div>
        </div>

    </div>
@endsection
