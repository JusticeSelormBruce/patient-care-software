@extends('layouts.app')
    @section('menu')
@endsection



@section('content')


    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('role.index') }}">Employee Roles</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Role</li>
        </ol>
    </nav>



    @include('includes.errors')
    


    {{-- form for updating role --}}
    <section class="mt-5">

        <h5>Edit Role</h5>


        <hr>


        <form action="{{ route('role.update', $role->id) }}" method="post">

            @csrf
            @method('put')

            
            <div class="mb-3 row">
                <label for="name" class="col-lg-3 col-form-label">Role</label>
                <div class="col-lg-9">
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $role->name ?? old('name') }}">
                    @if ($errors->has('name'))
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    @endif
                </div>
            </div>
            

            <div class="mb-3 text-right">
                <button type="submit" class="btn btn-dark">
                    <i class="fas fa-save"></i>
                    Update
                </button>
            </div>

        </form>

    </section>




    {{-- form for deleting a role --}}
    <section class="text-right">

        <form action="{{ route('role.destroy', $role->id) }}" method="post" class="d-inline" onclick="return confirm('Are you sure?')">
            @csrf
            @method('delete')

            <button class="btn btn-dark">
                <i class="fas fa-trash-alt"></i>
                Delete
            </button>
        </form>

    </section>
    

@endsection
