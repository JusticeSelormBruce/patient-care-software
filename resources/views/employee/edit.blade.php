@extends('layouts.app')

@section('menu')
    @include('employee.includes.menu')
@endsection





@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('employee.index') }}">Employees</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Employee</li>
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

        <h5>Edit Employee</h5>

        <hr>

        <form action="{{ route('employee.update', $employee->id) }}" method="post">
        
            @csrf
            @method('put')

            @include('employee.form')
        
        </form>


    </section>

@endsection
