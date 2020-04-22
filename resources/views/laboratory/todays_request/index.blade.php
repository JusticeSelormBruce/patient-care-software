@extends('layouts.laboratory')
@section('render')

    <div class="container-fluid pt-5">

            <div class="row">
                <div class="card w-100">
                    <div class="card-header">All Incoming Lab Request for Today</div>
                    <div class="card-body">
                        <div class="jumbotron">
                            <table class="table" id="table_id">
                                <thead>
                                <tr>
                                    <th>Doctor/Nurse</th>
                                    <th>Patient</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($TodaysLabRequest as $list)
                                    <tr>
                                        <td>
                                            @foreach($AllUsers as $user)
                                                @if($user->id == $list->docters_id)
                                                    {{$user->name}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($patients as $user)
                                                @if($user->id == $list->patient_id)
                                                    {{$user->lname}} <span class="mx-1">   {{$user->mname}}</span><span
                                                            class="mx-1">{{$user->fname}}</span>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>

                                            @include('laboratory.todays_request.details')

                                            <span class="mx-2"><a href="{{route('lab.request.form',['id'=>$list->id])}}"
                                                                  class="btn btn-primary btn-sm">Work on Request</a></span>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

    </div>
@endsection
