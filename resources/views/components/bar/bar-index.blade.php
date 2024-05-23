<div class="grid grid-cols-4 gap-8">
    @forelse($bars as $bar)
        <x-bar.bar-card :bar="$bar" />
    @empty
        <div>
            <p>No Bars Found</p>
        </div>
    @endforelse
</div>