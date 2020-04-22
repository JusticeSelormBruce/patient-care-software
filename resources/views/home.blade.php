@extends('layouts.app')

@section('content')
    <div>
        <div class="row pt-5">
            <div class="w-100 pt-5 ">
                <div class="container">
                    <div class="row">
                        <div class="mx-auto pt-5">
                            <h1>Welcome <span class="mx-2"></span>({{Auth::user()->name}})</h1>
                        </div>
                    </div>
                    <div class="row">
                        @if(Auth::user()->role_id == 1)
                            <a href="/admin/dashboard" class="mx-auto h4">
                                <img src="{{asset('images/hospital.jpg')}}" alt="image" class="d">
                                Continue to Dashboard</a>

                        @endif
                        @if(Auth::user()->role_id == 2)
                            <a href="/doctors-dashboard" class="mx-auto h4">Continue to Dashboard</a>
                        @endif
                        @if(Auth::user()->role_id == 3)
                            <a href="/doctors-dashboard" class="mx-auto h4">Continue to Dashboard</a>
                        @endif
                        @if(Auth::user()->role_id == 6)
                            <a href="/sales-form" class="mx-auto h4">Continue to Dashboard</a>
                        @endif
                        @if(Auth::user()->role_id == 4)
                            <a href="/inventory/dashboard" class="mx-auto h4">Continue to Dashboard</a>
                        @endif
                        @if(Auth::user()->role_id == 8)
                            <a href="/new-patient" class="mx-auto h4">Continue to Dashboard</a>
                        @endif
                        @if(Auth::user()->role_id == 5)
                            <a href="/laboratory-dashboard" class="mx-auto h4">Continue to Dashboard</a>
                        @endif
                        @if(Auth::user()->role_id == 9)
                            <a href="/cash/billing" class="mx-auto h4">Continue to Dashboard</a>
                        @endif
                        @if(Auth::user()->role_id == 10)
                            <a href="/payroll-reports" class="mx-auto h4">Continue to Dashboard</a>
                        @endif  @if(Auth::user()->role_id == 11)
                            <a href="/patient-dashboard" class="mx-auto h4">Continue to Dashboard</a>
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
