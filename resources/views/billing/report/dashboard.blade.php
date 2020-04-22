@extends('layouts.billing')
@section('render')
    <style>
        img {
            width: 25px;
            height: 25px;
            border-radius: 100px !important;
        }

        body, html {
            font-family: -apple-system;

        }

        .s {
            width: 200px !important;
        }

        .img1 {
            width: 100px;
            height: 100px;
            /*border-radius: 100px!important;*/
        }

        li {
            list-style: none !important;
        }

        .icon {
            width: 30px;
            height: 30px;
            border-radius: 100px;
        }

        a, hover {
            /*color: white !important;*/
            background-color: transparent !important;
        }

        hr {
            color: white !important;
            background-color: blue !important;
            margin: 0.3rem;
        }
        /*}*/

        /*body, html {*/
        /*    font-family: "Calisto MT";*/
        /*    font-size: small;*/
        /*}*/

        table, th, td {
            font-size: small !important;
        }
    </style>
    <div class="container pt-5">
        <div class="jumbotron pt-1">
            <div class="row">
                <div class="lead text-info">
                    Reports
                </div>
            </div>
            @if(session()->has('msg'))

                    <div class=" w-100">
                        <div class="alert alert-info small" >
                            {{session()->get('msg')}}
                        </div>
                    </div>

                @endif
            <form action="/get-report" method="post">
                <div class="row pt-5">
                    <div class="ml-auto w-75">
                        <div class="input-group-sm">
                            <span>Get Report between selected date and Today</span>
                            <div class="pt-3"></div>
                            <input type="date" class="w-75 form-control" name="date">
                        </div>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="mx-auto mx-5">
                        <button class="btn btn-outline-dark btn-sm"> Get Report</button>
                    </div>
                </div>
                @csrf
            </form>

        </div>
    </div>

@endsection
