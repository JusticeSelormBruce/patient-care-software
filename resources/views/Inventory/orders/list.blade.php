@extends('layouts.inventory')

@section('render')
    <style>
        table {
            font-size: 8pt !important;
        }
    </style>
    <div class="container-fluid pt-5">
        <div class="jumbotron">
            <div class="row">
                <div class="pt-5"></div>
            </div>
            <table id="table_id" class="table-bordered table-striped">
                <thead>
                <tr>


                    <th>Vendor</th>
                    <th>Item</th>
                    <th>Delivery Address</th>
                    <th>Date</th>
                    <th>Delivery Date</th>
                    <th>Reference</th>
                    {{--<th>Actions</th>--}}

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
@endsection
