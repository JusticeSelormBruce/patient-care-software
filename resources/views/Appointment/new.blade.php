@extends('layouts.admin')
@section('render')

    <style>

        @media only screen and (min-width: 768px) {
            .card {
                height: 60vh !important;
            }
        }

        @media only screen and (max-width: 768px) {

            .card {
                height: auto !important;
            }
        }

        @media only screen and (min-width: 600px) {
            .card {
                height: 60vh !important;
            }
        }
    </style>
    <div class="container">

        <div class="row pt-5"></div>

        <div class="card w-75">
            <div class="card-header lead"> My Appointment Settings</div>
            @if(session()->has('msg'))


                    <div class="pt-5">
                        <div class="alert alert-success w-100">
                          <h5>
                              {{session()->get('msg')}}
                          </h5>
                        </div>
                    </div>
                    <div class="ml-auto">
                        <a href="/add-new-appointment" class="btn btn-primary btn-sm ">Ok</a>
                    </div>

            @else
                <form action="/my-appointments" method="post" class="pt-3">
                    <div class="form-group mx-5">
                        <label for="">Appointment Date</label>
                        <input type="date" class="form-control" required name="appointment_date"
                        >
                    </div>
                    <div class="form-group mx-5">
                        <u>
                            <lead>Please Note: Appointment Time should be between Working Hours</lead>
                        </u>

                    </div>
                    <div class="form-group mx-5">
                        <label for="">Appointment Start Time</label>
                        <input type="text" class="form-control" required name="start" value="{{$time}}"
                               placeholder="Appointment Starting Time">
                    </div>
                    <div class="form-group mx-5">
                        <label for="">Appointment Start Time</label>
                        <input type="text" class="form-control" required name="end" value="{{$time}}"
                               placeholder="Appointment Ending Time">
                    </div>


                    <div class="form-group mx-5">
                        <input type="number" class="form-control" required name="max"
                               placeholder="Set Maximum Appointment in a day">
                    </div>
                    <div class="row">
                        <div class="mx-auto">
                            <button class="btn btn-primary btn-sm" type="submit">
                                Save
                            </button>
                        </div>
                    </div>
                    @csrf
                </form>
            @endif
        </div>


    </div>





@endsection
