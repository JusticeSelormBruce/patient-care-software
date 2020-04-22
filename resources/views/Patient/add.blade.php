@extends('layouts.Receptionist')
@section('render')

    <div class="container-fluid pt-4">
        <div class="jumbotron pt-1">
            <div class="mt-5">
                @if(session()->has('success'))
                    <div class="alert alert-success alert w-100" role="alert" style="height: 35px!important;">
                        {{session()->get('success')}}
                    </div>
                @endif
                <form action="/patient" method="post" class="pb-5" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        @include('Patient.form')
                    </div>

                </form>
            </div>
        </div>

    </div>


@endsection
