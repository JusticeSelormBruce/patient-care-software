@extends('layouts.pharmacy')
@section('render')
    <style>
        form {
            margin-right: auto;
            margin-left: auto;
            padding-top: 130px;
        }
        img {
            width: 25px;
            height: 25px;
            border-radius: 100px !important;
        }

        body, html {
            font-family: -apple-system;

        }

        .s {
            width: 200px !important;
        }

        .img1 {
            width: 100px;
            height: 100px;
            /*border-radius: 100px!important;*/
        }

        li {
            list-style: none !important;
        }

        .icon {
            width: 30px;
            height: 30px;
            border-radius: 100px;
        }

        a, hover {
            /*color: white !important;*/
            background-color: transparent !important;
        }

        hr {
            color: white !important;
            background-color: blue !important;
            margin: 0.3rem;
        }
        /*}*/

        /*body, html {*/
        /*    font-family: "Calisto MT";*/
        /*    font-size: small;*/
        /*}*/

        table, th, td {
            font-size: small !important;
        }

    </style>


    <div class="container-fluid pt-5">
        <div class="jumbotron pt-1">
            <div class="form-group ">

                <div>
                    <div class="row">
                        <div class="mx-auto w-75">

                            <form action="save-return-details" method="post">
                                <div class=" py-5">
                                    @csrf
                                    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
                                    <div class="form-group">
                                        <div>
                                            <span class="lead">Please provide detailed reason for returns</span>

                                            <textarea name="reason" id="description"  class="form-control pt-3"  required></textarea>
                                            <div>{{$errors->first('description')}}</div>
                                        </div>

                                        <script>
                                            CKEDITOR.replace('description', {
                                                removePlugins: 'image'
                                            });

                                        </script>
                                    </div>

                                    <div class="row">

                                        <button type="submit" class="btn btn-primary btn-sm mx-5 w-25">Submit</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
