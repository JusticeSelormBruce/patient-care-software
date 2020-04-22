@extends('layouts.admin')
@section('render')
    <div class="container pt-5">
        <div class="jumbotron pt-1">
            <form action="/reset-password" method="post">
                <div class="row py-5">
                    <div class="mx-auto w-50">
                        <div class="">

                            <select name="id" id="" required class="form-control">
                                @foreach($AllUsers as $users)
                                    <option value="{{$users->id}}">{{$users->name}}</option>
                                @endforeach
                            </select>
                            <div class="row  py-5">
                                <div class="mx-auto">
                                    <button class="btn btn-primary btn-sm" type="submit">Reset Password</button>
                                </div>
                            </div>
                            @csrf


                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection