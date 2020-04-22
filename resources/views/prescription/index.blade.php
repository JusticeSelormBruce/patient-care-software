@extends('layouts.admin')
@section('render')
    <div class="container-fluid py-5">
        <div class="jumbotron pt-2">
            <div class=" mx-2">
                <h5 class="lead">Prescription List for Today</h5>
            </div>
            <hr>
            <div class="">
                <table class="table" id="table_id">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Patient</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($listfortoday as $list)
                        <tr>
                            <td>{{$list->created_at}}</td>
                            <td>
                                @foreach($patients as $item)
                                    @if($item->id == $list->patient_id)
                                        <span class="mx-2">{{$item->fname}}</span>
                                        <span class="mx-2">{{$item->mname}}</span>
                                        <span class="mx-2">{{$item->lname}}</span>
                                    @endif
                                @endforeach
                            </td>

                            <td>@include('prescription.show')</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container-fluid">
            <div class="jumbotron pt-2">
                <div class=" mx-2">
                    <h5 class="lead">Prescription List</h5>
                </div>
                <hr>
                <div class="">
                    <table class="table" id="table_id1">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Patient</th>
                            <th>Diagnosis</th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($allPrescriptions as $list)
                            <tr>
                                <td>{{$list->created_at}}</td>
                                <td>
                                    @foreach($patients as $item)
                                        @if($item->id == $list->patient_id)
                                            <span class="mx-2">{{$item->fname}}</span>
                                            <span class="mx-2">{{$item->mname}}</span>
                                            <span class="mx-2">{{$item->lname}}</span>
                                        @endif
                                    @endforeach
                                </td>

                                <td>@include('prescription.show')</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        </div>

@endsection
