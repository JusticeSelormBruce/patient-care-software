@extends('layouts.admin')
@section('render')

    <div class=" container-fluid pt-5">
       <div class="jumbotron pt-2">
           <div class="row pt-5">
               <div class="mx-auto">
                   <h3>Lab Request</h3>
               </div>
           </div>

           <table class="table" id="table_id">
               <thead>
               <tr>
                   <th>Date</th>
                   <th>Patient Name</th>
                   <th> Department</th>
                   <th>Lab Request (description)</th>

               </tr>
               <tbody>
               @foreach($lab_request as $list)
                   <tr>
                       <td>{{$list->created_at}}</td>
                       <td>
                           @foreach($patients as $dept)
                               @if($list->patient_id == $dept->id)
                                   {{$dept->fname}} <span class="mx-2"></span>{{$dept->mname}} <span
                                       class="mx-2"></span>{{$dept->lname}}
                               @endif
                           @endforeach
                       </td>
                       <td>
                           @foreach($departments as $dept)
                               @if($list->department_id == $dept->id)
                                   {{$dept->name}}
                               @endif
                           @endforeach
                       </td>

                       <td>@include('lab_request.desc')</td>
                   </tr>
               @endforeach
               </tbody>
               </thead>
           </table>
       </div>
    </div>

@endsection
