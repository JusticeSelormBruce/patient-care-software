@extends('layouts.admin')
@section('render')
    <div class="container-fluid pt-5">
        <div class="jumbotron pt-1">
            <div class="">
                <div class="">
                    <div class="row">
                        <div class="lead">Add Nation</div>
                        <div class="ml-auto"><a href="/nation-index" class="btn btn-primary btn-sm">View Nation  List</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/save-nation"  method="post" class="form-group input-group-sm">
                        @include('Nationality.national_form')
                        <div class="row">
                            <div class="mx-auto py-3">
                                <button class="btn btn-sm btn-success" type="submit">Save  Details</button>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
