@extends('layouts.admin')
@section('render')
    <div class="container p-5">
        <div class="jumbotron">
            <div class="">
                <div class="">
                    <div class="row">
                        <div class="lead">Add Region</div>
                        <div class="ml-auto"><a href="/region-index" class="btn btn-primary btn-sm">View Regions List</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/save-region"  method="post" class="form-group input-group-sm">
                        @include('Regions.region_forms')
                        <div class="row">
                            <div class="mx-auto py-3">
                                <button class="btn btn-sm btn-success" type="submit">Save Regions Details</button>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
