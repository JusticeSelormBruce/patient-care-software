@extends('layouts.Receptionist')
@section('render')


    <div class="container-fluid pt-4">
        <div class="jumbotron pt-1">
            <div class="row">
                <div class="ml-auto">
                    <a href="/search-patient" class="btn btn-sm btn-primary"> Search Patient by ID</a>
                </div>
            </div>
            <div class="container-fluid pt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/all-visits" id="all-visits"></a></li>
                </ol>

                <h5>Today's Visit List</h5>

                <table class="table py-2" id="table_id">
                    <thead>
                    <tr>
                        <th>#PatientID</th>
                        <th>Department</th>
                        <th>Reason</th>

                    </tr>
                    <tbody>
                    @foreach($todaysVisits as $list)
                        <tr>
                            <td>{{$list->patientid}}</td>

                            <td>
                                @foreach($departments as $dpt)
                                    @if($dpt->id ==$list->department_id)
                                        {{$dpt->name}}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @include('Patient.PatientVists.reason')
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                    </thead>
                </table>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/all-visits" id="all-visits"></a></li>
                </ol>
                <h5>All Visit List</h5>

                <table class="table py-2" id="table_id1">
                    <thead>
                    <tr>
                        <th>#PatientID</th>
                        <th>Department</th>
                        <th>Reason</th>

                    </tr>
                    <tbody>
                    @foreach($Visits as $list)
                        <tr>
                            <td>{{$list->patientid}}</td>

                            <td>
                                @foreach($departments as $dpt)
                                    @if($dpt->id ==$list->department_id)
                                        {{$dpt->name}}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @include('Patient.PatientVists.reason')
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                    </thead>
                </table>
            </div>

        </div>


    </div>

@endsection
