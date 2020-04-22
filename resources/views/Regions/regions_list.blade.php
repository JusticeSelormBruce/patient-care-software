@extends('layouts.admin')
@section('render')
    <div class="container-fluid pt-5">
        <div class="jumbotron">
            <table id="table_id" class="table-bordered table-striped">
                <thead>
                <tr>

                    <th>#</th>
                    <th>Name</th>

                    <th>Actions</th>

                </tr>
                </thead>
                <tbody>
                @foreach($regions as $region)
                    <tr>
                        <td>{{$region->id}}</td>
                        <td>{{$region->name}}</td>

                        <td>
                            <div class="row">
                                <div class="mx-3">@include('Regions.edit_regions')</div>
                                <div class="mx-3">@include('Regions.delete_regions')</div>
                            </div>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>


    </div>
@endsection
