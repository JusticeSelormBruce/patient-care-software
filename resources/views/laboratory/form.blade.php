@extends('layouts.laboratory')
@section('render')
    <div class=" container-fluid pt-5">
        @if(session()->has('msg'))
            <div class="alert alert-success">
                {{session()->get('msg')}}
            </div>
            <div class="row">
                <div class="mx-auto">
                    <a href="/today-lab-request" class="btn btn-primary btn-sm w-25"><h4>OK</h4></a>
                </div>
            </div>
        @else
            <div class="jumbotron">
                <div class="row">
                    <span class="mx-auto h3"> Laboratory Request Preview</span>
                </div>
                <div class="row mt-1"></div>

                <div class="row py-2 ">
                    <div class="col-4 border">
                        <label for="" class="mx-5"> Lab Request By:</label>
                    </div>
                    <div class="col-8 border">
                        <span>{{$doctor->name}}</span>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-4 border">
                        <label for="" class="mx-5">Patient Name</label>
                    </div>
                    <div class="col-8 border">
                <span>
                    {{$patient->fname}} <span class="mx-2"></span>{{$patient->mname}} <span
                            class="mx-2"></span>{{$patient->lname}}
                </span>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-4 border">
                        <label for="" class="mx-5">Department</label>
                    </div>
                    <div class="col-8 border">
                <span>
                    {{$dept->name}}
                </span>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-4 border">
                        <label for="" class="mx-5">Description</label>
                    </div>
                    <div class="col-8 border">
                <span>
                   {{$data['description']}}
                </span>
                    </div>
                </div>
            </div>

            <div class="jumbotron py-2">
                <div class="card">
                    <div class="card-header">
                        Lab Request Result form
                    </div>

                    <form action="/submit-lab-request-result" method="post" class="mx-2">

                        <input type="hidden" name="request_id" value="{{$data['id']}}">
                        <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
                        <div class="form-group pt-3">
                            <div>
                                <label for="" class="lead">Please Provide Detailed Lab Result Here</label>
                            </div>
                            <div>
                                <textarea name="result" id="result" class="form-control" required></textarea>
                                <div>{{$errors->first('result')}}</div>
                            </div>

                            <script>
                                CKEDITOR.replace('description', {
                                    removePlugins: ''
                                });

                            </script>
                        </div>
                        <div class="form-group pt-3">
                            <div>
                                <label for="" class="lead">Note?</label>
                            </div>
                            <div>
                            <textarea name="note" id="" cols="30" rows="10" class="form-control">

                            </textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mx-auto">
                                <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        @endif
    </div>

@endsection
