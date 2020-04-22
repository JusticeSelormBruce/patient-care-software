@extends('layouts.admin')
@section('render')

   <div class="container-fluid pt-5">
       <div class="jumbotron pt-1">
           Register employee here

           <div class="row">
               <div class="ml-auto mr-5">
                   @include('Admin.UserAccount.add')
               </div>
           </div>

           <div class="container-fluid">
               <table id="table_id" class="table-bordered table-striped">
                   <thead>
                   <tr>

                       <th>#</th>
                       <th>Name</th>
                       <th> Phone</th>
                       <th>Email</th>
                       <th>Actions</th>

                   </tr>
                   </thead>
                   <tbody>
                   @foreach($users as $list)
                       <tr>
                           <td>{{$list->id}}</td>
                           <td>{{$list->name}}</td>
                           <td{{$list->name}}></td>
                           <td><a href="tel: {{$list->phone}}">{{$list->phone}}</a></td>
                           <td><a href="mailto: {{$list->email}}">{{$list->email}}</a></td>
                           <td>@include('Admin.UserAccount.show')</td>

                       </tr>

                   @endforeach
                   </tbody>
               </table>


           </div>
       </div>
   </div>


@endsection