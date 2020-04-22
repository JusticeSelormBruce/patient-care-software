@extends('layouts.admin')

@section('menu')
    @include('department.includes.menu')
@endsection





@section('render')

<div class="container pt-5">
<div class="jumbotron pt-1">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('department.index') }}">Departments</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Department</li>
        </ol>
    </nav>


    @include('includes.errors')



    <section class="mt-5">

        <h5>Edit Department</h5>

        <hr>

        <form action="{{ route('department.update', $department->id) }}" method="post">

            @csrf
            @method('put')


            <div class="mb-3 row">
                <label for="name" class="col-lg-3 col-form-label">Department Name</label>
                <div class="col-lg-9">
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $department->name }}">
                    @if ($errors->has('name'))
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    @endif
                </div>
            </div>

            <div class="mb-3 row">
                <label for="description" class="col-lg-3 col-form-label">Department Decription</label>
                <div class="col-lg-9">
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description')  ?? $department->description }}</textarea>
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

    <section class="text-right">

        <form action="{{ route('department.destroy', $department->id) }}" method="post" id="delet-department-form">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-dark">
                <i class="fas fa-trash-alt"></i>
                Delete
            </button>
        </form>

    </section>
</div>

</div>

@endsection
