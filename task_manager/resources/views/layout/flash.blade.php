@if(Session::has('alert-danger') || Session::has('alert-warning') || Session::has('alert-success') || Session::has('alert-info'))
    <div class="flash-message text-center">
        @foreach (['danger', 'warning', 'success', 'info'] as $class)
            @if(Session::has('alert-' . $class))
                <p class="alert alert-{{ $class }}">{!! Session::get('alert-' . $class) !!}</p>
            @endif
        @endforeach
    </div>
@endif
