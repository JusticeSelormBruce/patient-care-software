@extends('layouts.admin')
@section('render')

    <div class="container w-50">

        <div class="row pt-4">
            <span class="mx-auto h3">Preview Prescription Details </span>
        </div>
        <div class="row mt-5"></div>

        <div class="row py-2 ">
            <div class="col-4 border">
                <label for="" class="mx-5"> Prescribed  By:</label>
            </div>
            <div class="col-8 border">
                <span>{{$result->name}}</span>
            </div>
        </div>
        <div class="row ">
            <div class="col-4 border">
                <label for="" class="mx-5">Patient Name</label>
            </div>
            <div class="col-8 border">
                <span>
                    {{$patient->fname}} <span class="mx-2"></span>{{$patient->mname}} <span
                            class="mx-2"></span>{{$patient->lname}}
                </span>
            </div>
        </div>

    </div>


@endsection