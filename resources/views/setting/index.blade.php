@extends('layouts.admin')
@section('render')
    <style>
        .avatar {
            width: 150px !important;
            height: 150px !important;
        }

        .line {
            background-color: #cce5ff;

        }

        hr {
            margin: 0.3rem;
        }

        .bg {
            background-color: white;
        }

        body {
            font-family: -apple-system;
            font-size: small !important;
        }


    </style>
    @if($data == null)
        <form action="/store-org-details" method="post" enctype="multipart/form-data">
            <div class="container py-2">
                <div class="row">
                    <div class="col-8">
                        <div class=" w-100">
                            <div class="card-header">
                                Hospital Details Form
                            </div>
                            <div class="card-body">

                                <div class="mx-auto">
                                    <label for="">Hospital/Organization Name</label>
                                    <div>
                                        <input type="text" class="form-control" required name="name">
                                    </div>

                                </div>
                                <div class="mx-auto">
                                    <label for="">Location</label>
                                    <div>
                                        <input type="text" class="form-control" name="location">
                                    </div>

                                </div>
                                <div class="mx-auto">
                                    <label for="">Address</label>
                                    <div>
                                        <input type="text" class="form-control" name="address">
                                    </div>

                                </div>
                                <div class="mx-auto">
                                    <label for="">Email</label>
                                    <div>
                                        <input type="text" class="form-control" name="email">
                                    </div>

                                </div>
                                <div class="mx-auto">
                                    <label for="">Phone</label>
                                    <div>
                                        <input type="text" class="form-control" name="phone">
                                    </div>

                                </div>
                                <div class="mx-auto">
                                    <label for="">Description</label>
                                    <div>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control">

                            </textarea>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-4 py-5">
                        <div>
                            <label for="" class="lead"><input type="file" name="logo" class="w-100"
                                                              required
                                                              onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"
                                > </label>
                        </div>
                        <div class="row">
                            <div class="ml-3">
                                <img class="avatar rounded" id="blah"/>
                            </div>
                        </div>

                    </div>

                </div>
                <div>
                    <div class="row">
                        <div class="mx-auto ">
                            <button class=" btn btn-primary btn-sm" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            @csrf
        </form>
    @else
        <div class="jumbotron">

            <div class="container">
                <div class="row pt-2">
                    <div class="mx-auto">
                        @if($data == null)
                        @else
                            <img src="{{asset('storage/'.$data->logo )}}" alt="{{Auth::user()->name}}"
                                 style="border-image: initial" class="rounded-circle avatar">
                        @endif
                    </div>
                </div>

                <div class="row line py-2 text-uppercase">
                    <div class="col-3">Name</div>
                    <div class="col-3">Phone</div>
                    <div class="col-3">Email</div>
                    <div class="col-3">location</div>
                </div>
                <div class="row py-2 bg text-uppercase">
                    <div class="col-3">{{$data->name}}</div>
                    <div class="col-3">{{$data->phone}}</div>
                    <div class="col-3">{{$data->email}}</div>
                    <div class="col-3">{{$data->location}}</div>
                </div>

                <div class="row line py-2 text-uppercase">
                    <div class="col-3">Address</div>
                    <div class="col-3">Website</div>
                    <div class="col-3">Description</div>
                    <div class="col-3">Date</div>
                </div>
                <div class="row py-2 bg text-uppercase">
                    <div class="col-3">{{$data->address}}</div>
                    <div class="col-3">{{$data->website}}</div>
                    <div class="col-3">{{$data->description}}</div>
                    <div class="col-3">{{$data->created_at}}</div>
                </div>


            </div>
        </div>


    @endif
@endsection
