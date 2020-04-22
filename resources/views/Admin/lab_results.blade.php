@extends('layouts.admin')
@section('render')
    <div class="container-fluid pt-5">
        <div class="jumbotron pt-1">
            <div class="modal-body text-dark">
                <div class="row">
                    <div class="ml-auto mx-5">
                        @if($info == null)
                        @else
                            {{$info->name}} <span class="mx-2"></span>     <img
                                src="{{asset('storage/'.$info->logo) ?? 'logo'}}" alt="Profile" class=" rounded"
                                width="50">
                        @endif
                    </div>
                </div>
                <hr>
                <table id="table_id">
                    <thead>
                    <tr>
                        <th>date</th>
                        <th>Patient Name</th>
                        <th>Technician</th>
                        <th>Reason</th>
                        <th>Note</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($labResults == null)
                    @else


                        @foreach($labResults as $list)
                            <tr>


                                <td>
                                    {{$list->created_at}}
                                </td>
                                <td>
                                    @foreach($labResults as $request)
                                        @if($request->id == $list->request_id)
                                            @foreach($AllUsers as  $users)
                                                @if($users->id == $list->patient_id)
                                                    {{$users->name}}
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($AllUsers as  $users)
                                        @if($users->id == $list->technician_id)
                                            {{$users->name}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    {{$list->result}}
                                </td>

                                <td></td>
                            </tr>
                        @endforeach

                    </tbody>
                    @endif

                </table>
            </div>

        </div>
    </div>
    </div>
@endsection
