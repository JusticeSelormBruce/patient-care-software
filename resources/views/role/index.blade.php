@extends('layouts.app')

@section('menu')
    
@endsection





@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Employee Roles</li>
        </ol>
    </nav>


    @include('includes.errors')


    <section class="mt-5 text-right">

        <a href="{{ route('role.create') }}" class="btn btn-dark">
            <i class="fas fa-plus-circle"></i>
            Add Role
        </a>

    </section>

    {{-- display all departments --}}
    <section class="mt-5">

        @if ($roles->count())

        <table class="table">

            <thead>
                <tr>
                    <th>Roles</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>

                @foreach ($roles as $role)

                <tr>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a href="{{ route('role.edit', $role) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>

                @endforeach

            </tbody>

        </table>

        {{ $roles->links() }}

        @else

            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i>
                No Data found
            </div>

        @endif

    </section>

@endsection
