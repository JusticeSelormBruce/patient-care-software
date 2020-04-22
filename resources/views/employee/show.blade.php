@extends('layouts.app')

@section('menu')
    @include('employee.includes.menu')
@endsection





@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('employee.index') }}">Employees</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $employee->name }}</li>
        </ol>
    </nav>


    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">

            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
            
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif



    <section class="mt-5">

        <h5>{{ $employee->name }}</h5>

        <hr>

        <dl class="row">

            <dt class="col-lg-3">Department</dt>
            <dd class="col-lg-9">{{ $employee->department->name }}</dd>

            <dt class="col-lg-3">Role</dt>
            <dd class="col-lg-9">{{ $employee->role->name }}</dd>

        </dl>


        <dl class="row">

            <dt class="col-lg-3">Phone</dt>
            <dd class="col-lg-9">{{ $employee->phone }}</dd>

            <dt class="col-lg-3">Email</dt>
            <dd class="col-lg-9">{{ $employee->email }}</dd>

            <dt class="col-lg-3">Address</dt>
            <dd class="col-lg-9">{{ $employee->address }}</dd>

        </dl>

        <dl class="row">

            <dt class="col-lg-3">Date of Birth</dt>
            <dd class="col-lg-9">{{ $employee->dob->isoFormat('LL') }}</dd>

            <dt class="col-lg-3">Gender</dt>
            <dd class="col-lg-9">{{ $employee->gender }}</dd>

        </dl>

        <dl class="row">

            <dt class="col-lg-3">Created At</dt>
            <dd class="col-lg-9">{{ $employee->created_at->isoFormat('LLL') }}</dd>

            <dt class="col-lg-3">Last Updated At</dt>
            <dd class="col-lg-9">{{ $employee->updated_at->isoFormat('LLL') }}</dd>

        </dl>

    </section>

    <section class="mt-5">

        <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-dark">
            <i class="fas fa-edit"></i>
            Edit Employee Details
        </a>

        <br><br>

        <form action="{{ route('employee.destroy', $employee->id) }}" method="post">
            
            @csrf
            @method('delete')

            <button type="submit" class="btn btn-dark" onclick="return confirm('Are you sure?')">
                <i class="fas fa-trash-alt"></i> Delete Employee
            </button>

        </form>

    </section>

@endsection
