@extends('layouts.admin')
@section('render')

    <div class="container w-100">

        <div class="row pt-4">
            <span class="mx-auto h3">Preview Laboratory Request </span>
        </div>
        <div class="row mt-5"></div>

        <div class="row py-2 ">
            <div class="col-4 border">
                <label for="" class="mx-5"> Lab Request By:</label>
            </div>
            <div class="col-8 border">
                <span>{{$doctor->name}}</span>
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
        <div class="row py-2">
            <div class="col-4 border">
                <label for="" class="mx-5">Department</label>
            </div>
            <div class="col-8 border">
                <span>
                    {{$department->name}}
                </span>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-4 border">
                <label for="" class="mx-5">Description</label>
            </div>
            <div class="col-8 border">
                <span>
                   {{$description}}
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-6 w-50"><a href="/lab-request" class="  ml-5 btn btn-danger btn-sm w-50">Cancel</a></div>
            <div class="col-6">
                <a  href="{{route('confirm.labrequest',['status'=>1])}}" class=" btn btn-success btn-sm w-50">Submit Request</a>
            </div>
        </div>
    </div>


@endsection