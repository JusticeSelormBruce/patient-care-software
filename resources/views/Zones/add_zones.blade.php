@extends('layouts.admin')
@section('render')
    <div class="container pt-5">
        <div class="jumbotron">
            <div class="">
                <div class="">
                    <div class="row">
                        <div class="lead">Add Zone</div>
                        <div class="ml-auto"><a href="/zones-index" class="btn btn-primary btn-sm">View Zone List</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/save-zone"  method="post" class="form-group input-group-sm">
                        @include('Zones.zone_forms')
                        <div class="row">
                            <div class="mx-auto py-3">
                                <button class="btn btn-sm btn-success" type="submit">Save Zone Details</button>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
