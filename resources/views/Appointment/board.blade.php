@extends('layouts.admin')
@section('render')

    <style>

        @media only screen and (min-width: 768px) {
            .card {
                height: 20vh !important;
            }
        }

        @media only screen and (max-width: 768px) {

            .card {
                height: auto !important;
            }
        }

        @media only screen and (min-width: 600px) {
            .card {
                height: 20vh !important;
            }
        }

        .profile {
            width: 150px;
            height: 150px;
        }
    </style>
    <div class="container-fluid pt-5">
        <div class="jumbotron pt-2">
            <div class="row mx-lg-2">
                <div class=" w-100 ">
                    <div class="">
                        <div class=" mx-auto pb-5"> My Scheduled Appointments Today</div>

                        <table id="table_id">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Time</th>
                                <th>Patient</th>
                                <th>Reason</th>
                                <th> Remarks</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Appointments as $list)
                                <tr>
                                    <td>{{($Appointments->sum('id')) - ($Appointments->sum('id') -1)}}</td>
                                    <td>{{$list->time}}</td>
                                    <td>
                                        @foreach($patients as  $patient)
                                            @if($patient->patientid == $list->patientid)
                                                @include('Appointment.details')
                                            @endif
                                        @endforeach

                                    </td>
                                    <td>
                                        @include('Appointment.reason')
                                    </td>

                                    <td>
                                        @if($list->attended_to == 1)
                                            <span class="text-success"><strong>Completed</strong></span>
                                        @else
                                            <form action="/mark-appointment-completed" method="post">
                                                <div class="input-group-sm">
                                                    <input type="hidden" name="patientid" value="{{$list->patientid}}">
                                                    <select name="state" id="" class="form-control"
                                                            onchange="this.form.submit()">
                                                        <option value="0">Pending</option>
                                                        <option value="1">Completed</option>
                                                    </select>
                                                </div>
                                                @csrf
                                            </form>
                                        @endif
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
