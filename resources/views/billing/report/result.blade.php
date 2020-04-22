@extends('layouts.billing')
@section('render')
    <style>
        img {
            width: 25px;
            height: 25px;
            border-radius: 100px !important;
        }

        body, html {
            font-family: -apple-system;

        }

        .s {
            width: 200px !important;
        }

        .img1 {
            width: 100px;
            height: 100px;
            /*border-radius: 100px!important;*/
        }

        li {
            list-style: none !important;
        }

        .icon {
            width: 30px;
            height: 30px;
            border-radius: 100px;
        }

        a, hover {
            /*color: white !important;*/
            background-color: transparent !important;
        }

        hr {
            color: white !important;
            background-color: blue !important;
            margin: 0.3rem;
        }
        /*}*/

        /*body, html {*/
        /*    font-family: "Calisto MT";*/
        /*    font-size: small;*/
        /*}*/

        table, th, td {
            font-size: small !important;
        }
    </style>
    <div class="container pt-4">

        <div class="jumbotron pt-1" >
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
                    <div class="col-2"><b>Item</b></div>
                    <div class="col-2"><b>Quantity</b></div>
                    <div class="col-2"><b>Price</b></div>
                    <div class="col-2"><b>Date/Time</b></div>
                </div>
                <hr>

                @foreach($result as $list)
                    <div class="row small">
                        <div class="col-2">{{($list->count() + 1) -($list->id -1)}}</div>
                        @foreach($products as $item)
                            @if($item->id == $list->items_id)
                                <div class="col-2">
                                    {{$item->name}}
                                </div>
                            @endif
                        @endforeach

                        <div class="col-2">{{$list->quantity}}</div>
                        <div class="col-2">{{$list->amount}}</div>
                        <div class="col-2">{{$list->created_at}}</div>

                    </div>

                    <hr>
                @endforeach
                <hr>
                <hr>
                <div class="row text-success">
                    <div class="col-2"></div>
                    <div class="col-2"></div>
                    <div class="col-2">(#){{$result1->sum('quantity')}}</div>
                    <div class="col-2">(ghc){{$result1->sum('amount')}}</div>
                    <div class="col-2"></div>
                </div>
            </div>
            <div class="row">
                <div class="mx-auto w-100">
                    <button class="btn btn-outline-dark w-100 btn-sm text-success text-capitalize h6" onclick="window.print()">Print Report for <span class="mx-1 small">({{$date}} - Today)</span></button>
                </div>
            </div>
        </div>

    </div>
@endsection
