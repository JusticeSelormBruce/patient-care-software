@extends('layouts.admin')
@section('render')
    <div class="container-fluid pt-5">
       <div class="jumbotron pt-2">
         <div class="row">
             <div class="mx-auto w-75">
                 <div class="row pt-5">
                     <h2 class="lead">Lab Request Form</h2>
                 </div>
                 <div class="row">

                     <a href="/request-list" class="btn  btn-sm w-100  text-capitalize h3 " style="background-color: darkgrey">Request  List</a>

                 </div>
                 <form action="/incoming-request" method="post" class="pt-5">
                     @include('lab_request.form')
                     <div class="row">
                         <div class="mx-auto">
                             <button class=" btn btn-primary btn-sm" type="submit">Submit</button>
                         </div>
                     </div>
                     @csrf
                 </form>
             </div>
         </div>
       </div>
    </div>

@endsection
