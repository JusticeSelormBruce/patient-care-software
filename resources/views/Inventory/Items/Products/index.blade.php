@extends('layouts.inventory')

@section('render')
    <style>
        table{
            font-size: 8pt!important;
        }
    </style>
    <div class="container-fluid pt-5">
        <div class="jumbotron">
            <div class="py-4">
                @include('  Inventory.stock_limit')
            </div>
            <table id="table_id" class="table-bordered table-striped">
                <thead>
                <tr>
                    <th>SKU</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>No</th>
                    <th>Amount</th>
                    <th>Actions</th>

                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->sku}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->number}}</td>
                        <td> <span class="mx-1">({{$product->currency}})</span>{{$product->amount}}</td>

                        <td>
                            <div class="row">
                                <div class="mx-3">@include('Inventory.Items.Products.product_edit')</div>
                                <div class="mx-3">@include('Inventory.Items.Products.delete')</div>
                            </div>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>


    </div>
@endsection
