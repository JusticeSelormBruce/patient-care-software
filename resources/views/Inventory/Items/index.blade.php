@extends('layouts.inventory')

@section('render')
    <style>
        table {
            font-size: 8pt !important;
        }
    </style>
    <div class="container-fluid pt-5">
        <div class="jumbotron">
            <table id="table_id" class="table-bordered table-striped">
                <thead>
                <tr>

                    <th>#</th>
                    <th>Category Name</th>
                    <th> Category Description</th>
                    <th>Actions</th>

                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->category_name}}</td>
                        <td>{{$category->category_description}}</td>
                        <td>
                            <div class="row">
                                <div class="mx-3">@include('Inventory.Items.category_edit')</div>
                                <div class="mx-3">@include('Inventory.Items.delete')</div>
                            </div>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
