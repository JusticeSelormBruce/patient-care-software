@extends('layouts.inventory')

@section('render')
    <style>

        @media only screen and (min-width: 768px) {
            .card {
                height: 40vh !important;
            }
        }

        @media only screen and (max-width: 768px) {

            .card {
                height: auto !important;
            }
        }

        @media only screen and (min-width: 600px) {
            .card {
                height: 40vh !important;
            }
        }
        .img1{
            width: 120px;
            height: 120px;
        }
        h1{
            font-family: Bahnschrift;
            font-size: 50pt!important;
        }

    </style>
    <div class="container-fluid pt-5" style="font-size: small!important;">
        <div class="jumbotron pt-2">
            @if($stockstatus >= 1)
                <div class="row py-1">
                    <div class="ml-auto mx-5 text-danger">Alert
                        <span class="mx-2">
                        <small> Stock running Low</small>
                    <br>
                    <a href="/stock-is-running-out">Check Stock</a>

                </span></div>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card bg-secondary">
                        <div class="card-header"> Products</div>
                        <div class="d-flex py-2 px-5">
                            <img src="{{asset('images/product.png')}}" alt="product" class="size img1">
                            <span class="mx-5"></span>
                            <h1 class="pt-4">{{$product}}</h1>
                        </div>
                        <div class="row">
                            <div class="ml-auto mx-5">
                                <a href="/products" class="btn btn-primary btn-sm text-dark">View Product List</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card" style="background-color: wheat!important;">
                        <div class="card-header">Categories</div>
                        <div class="d-flex py-2 px-5">
                            <img src="{{asset('images/cat.png')}}" alt="" class="size img1">
                            <span class="mx-5"></span>
                            <h1 class="pt-4">{{$category}}</h1>
                        </div>
                        <div class="row">
                            <div class="ml-auto mx-5">
                                <a href="/categories" class="btn btn-primary btn-sm  text-dark">View All Category</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="row mx-lg-2">
                <div class=" w-100 bg-light">
                    <div class=""> Today's Orders</div>

                    <div class="">


                        <table id="table_id" class="table-bordered table-striped">
                            <thead>
                            <tr>


                                <th>Vendor</th>
                                <th>Item</th>
                                <th>Delivery Address</th>
                                <th>Date</th>
                                <th>Delivery Date</th>
                                <th>Reference</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->vendor}}</td>
                                    @foreach($items as $item)
                                        @if($item->id  ==$order->items_id)
                                            <td>{{$item->name}}</td>
                                        @endif
                                    @endforeach
                                    <td>{{$order->delivery_address}}</td>
                                    <td>{{$order->date}}</td>
                                    <td>{{$order->delivery_date}}</td>
                                    <td>{{$order->reference_code}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
