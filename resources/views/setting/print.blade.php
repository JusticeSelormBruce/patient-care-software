@extends('layouts.pharmacy')
@section('render')
    <style>
        img {
            width: 140px;
            height: 140px;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            #section-to-print, #section-to-print * {
                visibility: visible;
            }

            #section-to-print {
                position: absolute;
                left: 0;
                top: 0;
                background-color: white !important;
            }

            hr {
                margin: 0.1rem;
            }
        }
    </style>
    <div class="container pt-5 w-75 small">
        <div class="jumbotron">
            <div class="row">
                <div class="ml-auto mx-5">
                    @if($data == null)
                    @else
                        <div class="mx-2">
                            <span class="mx-3 text-capitalize pt-1"> {{$data->name}}</span>
                            <img src="{{asset('storage/'.$data->logo)}}" alt="{{Auth::user()->name}}"
                                 style="height: 50px!important; width: 50px;!important; border-radius: 50px!important;">
                        </div>
                    @endif
                </div>
            </div>
            <hr>
            <hr>
            <div class="row mx-1 text-primary">
                <div class="col-4"><b>Item</b></div>
                <div class="col-4"><b>Quantity</b></div>
                <div class="col-4"><b>Price</b></div>
            </div>
            <hr>
            <div>
                <div>
                    @foreach($files  as $bill)
                        <div class="row mx-1">
                            @foreach($products  as $item)
                                @if($item->id == $bill->items_id)
                                    <div class="col-4">
                                        {{$item->name}}
                                    </div>
                                @endif
                            @endforeach

                            <div class="col-4">{{$bill->quantity}}</div>
                            <div class="col-4">{{$bill->amount}}</div>
                        </div>
                        <hr>
                    @endforeach
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4"></div>
                        <div class="col-4">
                            <div class="row">
                                <div class="mx-auto "><b>Total</b> (GHC)<span class="mx-1">
                          <b>                     {{$amount->sum('amount')}}</b>
                                    </span></div>
                            </div>
                            <div class="row pt=0">
                                <div class="ml-auto">
                                    <div class="col-4 mx-5"><u> *********************

                                        </u></div>
                                </div>
                            </div>

                        </div>

                    </div>
                        <form action="/sales-form">
                            @csrf
                            <div class="row">
                                <div class="mx-auto w-25">
                                    <button  type="submit" class="btn btn-primary btn-sm w-50" onclick="window.print()">Print</button>
                                </div>
                            </div>
                        </form>


                </div>
            </div>
        </div>
    </div>


    </div>
@endsection