<header class="mb-2">
    <div class="container-fluid">
        <div class="row py-2 px-3">
            <div class="@if(auth()->user()) col-10 @else col-12 @endif">
                <div class="h3">@yield('header')</div>
            </div>
            @auth()
                <div class="col-2 d-flex align-items-center justify-content-end">
                    <ul class="list-unstyled m-0 p-0">
                        <li><a class="btn btn-dark" href="{{ route("logout") }}"><i class="fas fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            @endauth
        </div>
    </div>
</header>
