@extends('layouts.Receptionist')
@section('render')
    <style>
        .profile{
            width: 150px;
            height: 150px;
        }
        img {
            width: 100px;
            height: 100px;
        }
    </style>
    <div class="container  pt-5">
        <div class="jumbotron ">
            <span>
               Incoming Appointments for Today
            </span>
            <hr>
        </div>
        <div class="jumbotron pt-2">
            <div class="row mx-lg-2">
                <div class=" w-100 ">
                    <div class="">
                        <div class=" mx-auto"> My Scheduled Appointments Today</div>

                        <table id="table_id">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Time</th>
                                <th>Patient ID</th>
                                <th>Patient</th>
                                <th> Doctor</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Appointments as $list)
                                <tr>
                                    <td>{{($Appointments->sum('id')) - ($Appointments->sum('id') -1)}}</td>
                                    <td>{{$list->time}}</td>
                                    <td>{{$list->patientid}}</td>
                                    <td>
                                        @foreach($patients as  $patient)
                                            @if($patient->patientid == $list->patientid)
                                                @include('Appointment.details')
                                            @endif
                                        @endforeach

                                    </td>

                                    <td>
                                        @foreach($AllUsers as  $user)
                                            @if($user->id == $list->user_id)
                                              {{$user->name}}
                                            @endif
                                        @endforeach
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
