@extends('layouts.inventory')

@section('render')
    <div class="container-fluid pt-5">
        <div class="jumbotron pt-2">
            <div class="row mx-lg-2">
                <div class="card w-100" style="height: 90vh!important;">
                    <div class="card-header"></div>

                    <div class="card-body">

                        <table id="table_id" class="table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SKU</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>No</th>
                                <th>Amount</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $product)
                                <tr>
                                    <td>{{$product->sku}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->category}}</td>
                                    <td>{{$product->price}}</td>
                                    <td class="bg-danger">{{$product->number}}</td>
                                    <td> <span class="mx-1">({{$product->currency}})</span>{{$product->amount}}</td>



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
