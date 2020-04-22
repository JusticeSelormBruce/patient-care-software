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
                   <li class="breadcrumb-item active" aria-current="page">{{ $department->name }}</li>
               </ol>
           </nav>


           @include('includes.errors')



           <section class="mt-5">

               <h5>Department Details</h5>

               <hr>

               <dl class="row">

                   <dt class="col-lg-3">Department Name</dt>
                   <dd class="col-lg-9">{{ $department->name }}</dd>

                   <dt class="col-lg-3">Department Description</dt>
                   <dd class="col-lg-9">{{ $department->description }}</dd>

               </dl>


           </section>

           <section class="mt-3">

               <a href="{{ route('department.edit', $department->id) }}" class="btn btn-dark">
                   <i class="fas fa-edit"></i>
                   Edit Department Details
               </a>

               <br>
               <br>

               <form action="{{ route('department.destroy', $department->id) }}" method="post" onclick="return confirm('Are you sure?')">
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
