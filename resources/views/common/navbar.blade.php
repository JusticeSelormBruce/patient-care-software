<nav class="navbar navbar-expand-md ">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
                    <span class="row">
                       @if($info == null)
                        @else
                            <img src="{{asset('storage/'.$info->logo) ?? 'logo'}}" alt="logo"  width="100" class="rounded-circle">
                        @endif
                   <span class="mx-4"></span>
                    <h1 class="pt-3 text-light"> {{$info->name ?? ''}}</h1>
                    </span>


        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->

        </div>
    </div>
</nav>
