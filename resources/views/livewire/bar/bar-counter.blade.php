<!-- card body  -->
<div class="flex flex-col items-start justify-between flex-auto py-8 px-9 border rounded-md">
    <div class="flex flex-col my-7">
        <span class="text-white text-secondary-inverse text-4xl tracking-[-0.115rem] font-bold">{{ $barCount }}</span>
        <div class="m-0">
            <span class="font-medium text-white text-secondary-dark text-lg/normal">{{ $title }}</span>
        </div>
    </div>
    <span class="inline-flex items-center px-2 py-1 mr-auto font-semibold text-white text-center align-baseline rounded-lg text-base/none text-success bg-success-light border border-success">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941"></path>
        </svg>
        {{ $percentageChange }}%
    </span>
</div>
<!-- end card body  -->
