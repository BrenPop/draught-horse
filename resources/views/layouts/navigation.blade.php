@auth
    @if (Auth::user()->isAdmin())
        @include('navigation.admin')
    @elseif (Auth::user()->isBar())
        @include('navigation.bar')
    @elseif (Auth::user()->isDrinker())
        @include('navigation.drinker')
    @endif
@endauth