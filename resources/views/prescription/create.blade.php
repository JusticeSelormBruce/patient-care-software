@extends('layouts.admin')
@section('render')
    <style>
        hr {
            margin: 0.2rem !important;
        }
    </style>
    <div class="container-fluid pt-5">
        <div class="jumbotron pt-2">
            @if($prescription == null)
                <form action="/preview-prescription" method="post" py-5>

                    <div>
                        <section>
                            <div class="row py-2">
                                <div class="col-6 input-group-sm">
                                    <label for="" class="mx-5">Slect Medicine</label>
                                    <div class="mx-2">
                                        <select name="name" id="" class="form-control" required>
                                            <option value="">Select Drug from the list</option>
                                            @foreach($allAvailableDrugs as $drug)
                                                <option value="{{$drug->name}}">{{$drug->name}}</option>
                                            @endforeach
                                        </select>
                                  
                                    </div>

                                </div>
                                <div class="col-6 input-group-sm">
                                    <label for="" class="mx-5">Strength of Medicine</label>
                                    <div class="mx-2">
                                        <input type="text" class="form-control" name="strength">
                                    </div>

                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-6 input-group-sm">
                                    <label for="" class="mx-5">Medicine Dosage</label>
                                    <div class="mx-2">
                                    <textarea name="dosage" id="" cols="30" rows="10" class="form-control" required>

                                    </textarea>
                                    </div>

                                </div>
                                <div class="col-6 input-group-sm">
                                    <label for="" class="mx-5">Note/description</label>
                                    <div class="mx-2">
                            <textarea name="note" id="" cols="30" rows="10" class="form-control">

                            </textarea>
                                    </div>

                                </div>
                            </div>

                        </section>
                    </div>
                    <div>
                        <section>
                            <div class="row py-2">
                                <div class="col-12 input-group-sm">
                                    <label for="" class="mx-5">Select Patient</label>
                                    <div class="mx-2">
                                        <select name="patient_id" id="" class="form-control" required>
                                            <option value="">Select Patient</option>
                                            @foreach($patients as $list)
                                                <option value="{{$list->id}}">
                                                    <span class="mx-2">{{$list->fname}}</span>
                                                    <span class="mx-2">{{$list->mname}}</span>
                                                    <span class="mx-2">{{$list->lname}}</span>
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="col-12 input-group-sm py-2">
                                    <label for="" class="mx-5">Allergies</label>
                                    <div class="mx-2">
                                        <textarea name="allegies" id="" cols="30" rows="10"
                                                  class="form-control"></textarea>
                                    </div>

                                </div>
                            </div>
                        </section>
                    </div>


                    <div class="row pt-3">
                        <div class="mx-auto ">
                            <button class="btn  btn-primary   h2" type="submit"> Submit</button>
                        </div>
                    </div>

                    @csrf
                </form>
            @else
                <div c>
                    <div class="row">
                        <div class="ml-auto mx-5 rounded">@include('prescription.add')</div>
                    </div>
                    <div>
                        @include('prescription.list')
                    </div>
                </div>


            @endif
        </div>

    </div>
@endsection
