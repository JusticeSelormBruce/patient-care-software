@extends('layouts.inventory')
@section('render')
    <style>
        .card{
            height: auto!important;
        }
    </style>

    <div class="container-fluid pt-5">
        <div class="jumbotron">
            <div class=" pb-5">
                <div class="">
                    <div class="row">
                        <a href="/customers" class=" lead ml-auto">View Vendors List</a>
                    </div>
                    <form action="/save-customer-details" method="post" class="yb-5"  enctype="multipart/form-data">
                        @include('Inventory.customers.form')
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
