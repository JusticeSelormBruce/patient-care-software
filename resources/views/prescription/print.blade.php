@extends('layouts.admin')
@section('render')
    <style>
        @media print {
            body,html * {
                visibility: hidden;
            }

            #section-to-print, #section-to-print * {
                visibility: visible;
            }

            #section-to-print {
                position: absolute;
                left: 0;
                top: 0;
                background-color: white !important;
            }
        }
    </style>
    <div class="my-5 "id="section-to-print">

        <div class="row">
            <div class="mx-auto">
                <div class="row">
                    <span class="mx-auto h3">Preview  Prescription  </span>
                </div>
            </div>
        </div>
        <hr>
        <div id="section-to-print">
            <div class="row pt-2">
                <div class="mx-auto">
                    <img src="{{asset('storage/'.$info->logo)}}" alt="{{$info->name}}"
                         style="border-image: initial" class="rounded-circle">
                </div>
            </div>
            <div class="row">
                <div class="mx-auto">
                    <div class="row lead h2 py-2">
                        <span class="mx-auto">  Prescription  By: </span> <span    class="mx-2">
                            {{Auth::user()->name}}</span>
                    </div>
                </div>
            </div>
            @foreach($prescription as $list)
                <div class="container w-75">


                    <div class="row mt-5"></div>

                    <div class="row py-2 ">
                        <div class="col-4 border">
                            <label for="" class="mx-5"> <span>Medicine:</span>:</label>
                        </div>
                        <div class="col-8 border">
                            <span>{{$list->name}}</span>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-4 border">
                            <label for="" class="mx-5"> <span>Dosage Plan:</span></label>
                        </div>
                        <div class="col-8 border">
                            <span>{{$list->dosage}}</span>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-4 border">
                            <label for="" class="mx-5"> <span>Dosage Strength:</span></label>
                        </div>
                        <div class="col-8 border">
                <span>
                    <span>{{$list->strength}}</span>
                </span>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-4 border">
                            <label for="" class="mx-5"> <span>Alleges:</span></label>
                        </div>
                        <div class="col-8 border">
                            <span>{{$list->allegies}}</span>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-4 border">
                            <label for="" class="mx-5"> <span>Note:</span></label>
                        </div>
                        <div class="col-8 border">
                            <span>{{$list->note}}</span>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-4 border">
                            <label for="" class="mx-5"> <span>Patient:</span></label>
                        </div>
                        <div class="col-8 border">
                            @foreach($patients  as $item)
                                @if($item->id == $list->patient_id)
                                    <span class="mx-2">{{$item->fname}}</span>
                                    <span class="mx-2">{{$item->mname}}</span>
                                    <span class="mx-2">{{$item->lname}}</span>
                                @endif
                            @endforeach
                        </div>
                    </div>

                </div>


            @endforeach
        </div>

        <div class="container">
            <div class="row py-5">

                    <div class="mx-auto">
                        <button class="btn btn-secondary btn-sm" type="submit" onclick="window.print()">Print Prescription</button>
                    </div>

            </div>
        </div>

    </div>

@endsection