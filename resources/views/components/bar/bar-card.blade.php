
<div class="flex flex-col p-6 border rounded">
    <div class="text-md text-white">
        <img src="{{ $bar->profile_picture_path }}" alt="{{ $bar['name'] }} Profile Picture" style="max-width: 200px; height: auto;">
        <h3>{{ $bar->name }} - {{ $bar->type->name }}</h3>
        <p>Profile: {{ $bar->profile_completion_percentage }}%</p>
    </div>
    <div class="">
        <x-anchor-link-button href="{{ route('bar.show', $bar) }}">View</x-anchor-link-button>
    </div>
</div>