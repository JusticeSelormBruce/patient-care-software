@extends('layouts.admin')
@section('render')
    <div class="container-fluid pt-5">
        <div class="jumbotron pt-1">  <table id="table_id" class="table-bordered table-striped">
                <thead>
                <tr>

                    <th>#</th>
                    <th>Name</th>
                    <th> Description</th>
                    <th>Actions</th>

                </tr>
                </thead>
                <tbody>
                @foreach($nationals as $national)
                    <tr>
                        <td>{{$national->id}}</td>
                        <td>{{$national->name}}</td>
                        <td>
                            {{$national->description}}
                        </td>
                        <td>
                            <div class="row">
                                <div class="mx-3">@include('Nationality.edit_national')</div>
                                <div class="mx-3">@include('Nationality.delete_national')</div>
                            </div>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>



    </div>
@endsection
