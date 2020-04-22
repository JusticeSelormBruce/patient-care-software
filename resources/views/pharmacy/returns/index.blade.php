@extends('layouts.pharmacy')
@section('render')

    <div class="container-fluid pt-5">
        <div class="jumbotron pt-1">
        <form action="/check-reference-id" method="post">
            <div class="row">
                <div class="mx-auto">

                    <h2>Returns form</h2>
                </div>
            </div>
            <div class=" row pt-5">
                <div class="ml-auto mr-5">
                    @if(session()->has('message'))
                        <div class="">
                            <div class="alert alert-danger alert" role="alert">
                                {{session()->get('message')}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="ml-auto">
                                <a href="/returns" class="btn btn-info btn-sm">Ok</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

                    @if(session()->has('success'))

                            <div class="alert alert-success alert w-100" role="alert" style="height: 35px!important;">
                                  {{session()->get('success')}}

                            </div>
                        <div class="row">
                            <div class="mx-auto">
                                <a href="" class="btn btn-info btn-sm">Ok</a>
                            </div>
                        </div>

                    @endif

            <div class="mx-auto w-50 mt-5">
                <label for="">Enter Reference ID to search</label>
                <div>
                    <input type="text" class="form-control" required name="refid">
                </div>

            </div>
            <div class="row pt-2">
                <button class="btn btn-primary btn-sm mx-auto w-25" type="submit">Search</button>
            </div>
            @csrf
        </form>


        </div>
@endsection
