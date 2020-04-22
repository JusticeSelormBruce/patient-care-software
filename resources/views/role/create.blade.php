@extends('layouts.app')

@section('menu')
    
@endsection





@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('role.index') }}">Employee Roles</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Role</li>
        </ol>
    </nav>


    @include('includes.errors')


    <section class="mt-5">

        <h5>Add Role</h5>

        <hr>

        <form action="{{ route('role.store') }}" method="post">

            @csrf

            <div class="mb-3 row">
                <label for="name" class="col-lg-3 col-form-label">Role</label>
                <div class="col-lg-9">
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    @endif
                </div>
            </div>
            
            <div class="mb-3 text-right">
                <button type="submit" class="btn btn-dark">
                    <i class="fas fa-save"></i>
                    Save
                </button>
            </div>

        </form>

    </section>

@endsection
