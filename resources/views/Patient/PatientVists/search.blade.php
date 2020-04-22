@extends('layouts.Receptionist')
@section('render')
    <style>
        img {
            width: 50px !important;
            height: 50px !important;
        }
    </style>
    <div class="container-fluid pt-5">
        <div class="jumbotron pt-1">
            @if(session()->has('msg'))
                <div class="container">
                    <div class="alert alert-danger">
                        {{session()->get('msg')}}
                    </div>
                    <div class="row">
                        <div class="mx-auto">
                            <a href="/new-patient" class="btn btn-sm btn-primary"> New Patient </a>
                        </div>
                    </div>
                </div>

            @else
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <form action="/get-patient" method="post">
                            <div class="">
                                <div class="mx-auto w-100 mt-5">
                                    <label for="">Enter Patient ID to search</label>
                                    <div>
                                        <input type="text" class="form-control" required name="id">
                                    </div>

                                </div>

                            </div>
                            @csrf
                            <div class="row pt-2">
                                <button class="btn btn-primary btn-sm mx-auto w-25" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="row">
                            <div class="mx-auto  w-100 mt-5  pt-2">
                                <a  href="finger-print-verify" class="btn btn-primary  btn-lg text-lowercase">Search Using Fingerprint</a>
                            </div>
                        </div>
                    </div>
                </div>

            @endif
        </div>
    </div>



@endsection
