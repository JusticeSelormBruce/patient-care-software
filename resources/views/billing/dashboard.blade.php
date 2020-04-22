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

    <div class="container">
        <div class="row pt-5">
                @include('billing.bill')
            </div>
        </div>
    <div class="">
        @include('billing.invoice_for_today')
    </div>

    </div>
@endsection
