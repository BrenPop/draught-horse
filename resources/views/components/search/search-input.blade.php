{{-- search input for SearchController search function --}}

<form method="GET" action="{{ route('search') }}">
    <x-text-input type="text" name="search" placeholder="Search for Bars" />
    <input type="submit" value="Search" />
</form>