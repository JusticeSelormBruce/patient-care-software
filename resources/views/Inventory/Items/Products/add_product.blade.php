@extends('layouts.inventory')
@section('render')
    <style>
        .card{
            height: auto!important;
        }
    </style>

    <div class="container-fluid pt-5">
        <div class="jumbotron pt-2">
            <div class=" pb-5">
                <div class="">
                    <div class="row">
                        <a href="/products" class=" lead ml-auto">View All Products</a>
                    </div>
                    <form action="/save-product-details" method="post" class="yb-5">
                        @include('Inventory.Items.Products.form')
                        <div class="row">
                            <div class="mx-auto mb-5 py-b-5">
                                <button class="btn btn-primary btn-sm" type="submit">Save</button>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>

        </div>
    </div>


@endsection
