@extends('layouts.inventory')
@section('render')
    <style>
        .card {
            height: auto !important;
        }
    </style>

    <div class="container-fluid pt-5">
        <div class="jumbotron pt-2">
            <div class=" pb-5 mx-2">
                <div class="cw-75">
                    <div class="row">
                        <a href="/orders" class=" lead ml-auto">View Purchase Orders</a>
                    </div>
                    <div class="py-1">
                        <div class="row">
                            <div class="mr-auto mx-2">Item Details</div>
                        </div>
                        <form action="/get-product-price" method="post">
                            <div class="row input-group-sm">
                                <div class="col-lg-2 col-md-12 col-sm-12 input-group-sm">
                                    <label for=""></label>
                                </div>

                                <div class="col-lg-8 col-md-11 col-sm-11 input-group-sm">
                                    <select name="product_id" id="" class="form-control" onchange="this.form.submit()">
                                        @if($product == null)
                                            <option value="">Select Item</option>
                                            @foreach($items as $list)
                                                <option value="{{$list->id}}"> {{$list->name}}</option>
                                            @endforeach
                                        @else
                                            @foreach($items as $list)
                                                <option value="{{$list->id}}"
                                                        @if($product->id == $list->id) selected @endif> {{$list->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                @csrf


                            </div>
                        </form>
                    </div>
                    <form action="/save-order-temp" method="post" class="py-2" id="submitMainForm">
                        @include('Inventory.orders.form')
                        <div class="row">
                            <div class="mx-auto mb-5 py-b-1">
                                <button class="btn btn-primary btn-sm" type="submit"
                                        onclick="document.getElementById('submitMainForm').submit();">
                                    @if($orders->count() == 0)
                                        Save
                                    @else
                                        Add
                                    @endif
                                </button>
                            </div>
                        </div>
                        @csrf
                    </form>
                    <section>
                        <div class="jumbotron py-0">
                            <div class="row">
                                <div class="pt-1"></div>
                            </div>
                            @if($orders !=null)
                                <table class="table-bordered table-striped table">
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
                                @endif


                            <div class="row">
                                <div class="mx-auto">
                                    <a href="/store-ordertemp-data" class="btn btn-primary text-dark">Save</a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var default_price = 0.00;
        document.getElementById('amount').setAttribute('value', default_price);

        function Sum() {
            var price = document.getElementById("price").value;
            console.log(price)
            var num = document.getElementById("number").value;

            if (num <= 0) {

                document.getElementById('amount').setAttribute('value', 0);
            } else {
                var result = parseInt(num) * parseInt(price);
                document.getElementById('amount').setAttribute('value', result);

            }
        }
    </script>
@endsection
