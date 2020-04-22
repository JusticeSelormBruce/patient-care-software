@extends('layouts.app')

@section('menu')
    @include('employee.includes.menu')
@endsection





@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Employees</li>
        </ol>
    </nav>


    @include('includes.errors')


    <section class="mt-5 text-right">

        <a href="{{ route('employee.create') }}" class="btn btn-dark">
            <i class="fas fa-plus-circle"></i>
            Add Employee
        </a>

    </section>



    {{-- display all departments --}}
    <section class="mt-5">

        @if ($employees->count())

        <table class="table">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Role</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>

                @foreach ($employees as $emp)
                    <tr>
                        <td><a href="{{ route('employee.show', $emp->id) }}">{{ $emp->name }}</a></td>
                        <td>{{ $emp->department->name }}</td>
                        <td>{{ $emp->role->name }}</td>
                        <td>
                            <a href="{{ route('employee.edit', $emp->id) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>

        {{ $employees->links() }}

        @else

            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i>
                No Data found
            </div>

        @endif

    </section>

@endsection
