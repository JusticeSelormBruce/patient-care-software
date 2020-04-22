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
                <div class="mx-5 ml-auto">
                    <a href="/Add-Customers" class="lead">  Add Vendor</a>

                </div>
            </div>
            <table id="table_id" class="table-bordered table-striped">
                <thead>
                <tr>

                    <th>#</th>
                    <th>Vendor Type</th>
                    <th> Primary Contact</th>
                    <th>Company Name</th>
                    <th> Display Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Website</th>
                    <th>Avatar</th>
                    <th>Actions</th>

                </tr>
                </thead>
                <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{$customer->id}}</td>
                        <td>{{$customer->customer_type}}</td>
                        <td>{{$customer->primary_contact}}</td>
                        <td>{{$customer->company_name}}</td>
                        <td>{{$customer->display_name}}</td>
                        <td>
                            <a href="mailto:  {{$customer->customer_email}}">  {{$customer->customer_email}}</a>
                        </td>
                        <td>
                            <a href="tel:  {{$customer->customer_phone}}"> {{$customer->customer_phone}}</a>
                        </td>
                        <td>{{$customer->website}}</td>
                        <td><img src="{{asset('storage/'.$customer->avatar)}}" alt="avatar"></td>
                        <td>
                            <div class="row">
                                <div class="mx-3">@include('Inventory.customers.edit')</div>
                                <div class="mx-3">@include('Inventory.customers.delete')</div>
                            </div>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>


    </div>
@endsection
