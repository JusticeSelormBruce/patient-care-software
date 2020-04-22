@extends('layouts.pharmacy')
@section('render')
<style>
a{
    text-decoration:none!important;
}
</style>
<div class="container-fluid pt-4">
    <div class="jumbotron pt-3">
        <div class="row">
            <div class="mx-auto">
                <a href="#allsales" class=" h3 lead">Goto All Sales</a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card shadow-lg">
                <div class="card-header h5"> Today's Sales</div>

                <div class="card-body">
                    @include('pharmacy.sales.todays_sales')
                </div>
            </div>


            <div class="card shadow-lg" id="allsales">
                <div class="card-header  h5"> All Sales</div>

                <div class="card-body">
                    @include('pharmacy.sales.sales')
                </div>
            </div>
        </div>
    </div>
</div>


@endsection