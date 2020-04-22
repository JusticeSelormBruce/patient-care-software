@extends('layouts.admin')

@section('menu')
    @include('department.includes.menu')
@endsection



@section('render')

    <div class="container pt-5">
      <div class="jumbotron pt-1">
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">Departments</li>
              </ol>
          </nav>


          @include('includes.errors')


          <section class="mt-5 text-right">

              <a href="{{ route('department.create') }}" class="btn btn-dark">
                  <i class="fas fa-plus-circle"></i>
                  Add Department
              </a>

          </section>



          {{-- display all departments --}}
          <section class="mt-5">

              @if ($departments->count())

                  <table class="table" id="table_id" >

                      <thead>
                      <tr>
                          <th>Department</th>
                          <th>Description</th>
                          <th>Action</th>
                      </tr>
                      </thead>

                      <tbody>

                      @foreach ($departments as $dept)

                          <tr>
                              <td><a href="{{ route('department.show', $dept->id) }}">{{ $dept->name }}</a></td>
                              <td>{{ $dept->description }}</td>
                              <td>
                                  <a href="{{ route('department.edit', $dept->id) }}">
                                      <i class="fas fa-edit">Edit</i>
                                  </a>
                              </td>
                          </tr>

                      @endforeach

                      </tbody>

                  </table>

                  {{--{{ $departments->links() }}--}}

              @else

                  <div class="alert alert-info">
                      <i class="fas fa-info-circle"></i>
                      No Data found
                  </div>

              @endif

          </section>
      </div>

    </div>



@endsection
