@extends('layouts.admin')
@section('render')
<div class="container-fluid pt-5 small">
    <div class="jumbotron pt-1">
        @include('Admin.roles.add')
        <div class="container-fluid">
            <table class="table table-striped ">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Role Name</th>
                    <th> Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->description}}</td>
                        <td>
                            <div class="row">
                                <div class="mx-3">@include('Admin.roles.edit_roles')</div>
                                <div class="mx-3">@include('Admin.roles.delete')</div>
                            </div>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="py-5">

            </div>
        </div>
    </div>
</div>

@endsection