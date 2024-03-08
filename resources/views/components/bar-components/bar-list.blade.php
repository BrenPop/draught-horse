@props(['bars'])

<div>
    @foreach($bars as $bar)
        <div class="bar">
            <h3>{{ $bar['name'] }}</h3>
            <p>{{ $bar['description'] }}</p>
            <img src="{{ $bar['profile_picture_path'] }}" alt="{{ $bar['name'] }} Profile Picture">
            <p>User ID: {{ $bar['user_id'] }}</p>
            <p>Bar Type ID: {{ $bar['bar_type_id'] }}</p>
            <p>Profile Completion Percentage: {{ $bar['profile_completion_percentage'] }}%</p>
        </div>
    @endforeach
</div>
