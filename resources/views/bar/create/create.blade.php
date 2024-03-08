<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Register Bar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Registration") }}
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('bar.store') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- Profile Picture --}}
                        <div>
                            <x-input-label for="profile_picture" :value="__('Profile Picture')" />
                            <input id="profile_picture" type="file" name="profile_picture" class="block mt-1 w-full" accept="image/*" autofocus />
                            <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
                        </div>                        
    
                        {{-- Name --}}
                        <div class="pt-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
    
                        {{-- Description --}}
                        <div class="pt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" autofocus autocomplete="description" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        {{-- Bar Type --}}
                        <div class="pt-4">
                            <x-input-label for="bar_type_id" :value="__('Which option best describes the bar?')" />
                
                            <x-select-dropdown name="bar_type_id" :options="$barTypes" />
                
                            <x-input-error :messages="$errors->get('bar_type_id')" class="mt-2" />
                        </div>
    
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>  
            </div>
        </div>
    </div>
</x-app-layout>
