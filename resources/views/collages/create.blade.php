<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Collage') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Form for Creating a Collage -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('collages.store') }}" method="POST">
                    @csrf

                    <!-- Collage Name Field -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Collage Name') }}</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-200 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            required
                        />
                        @error('name')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                            {{ __('Create Collage') }}
                        </button>
                    </div>
                </form>

                <!-- Back Button -->
                <div class="flex justify-start mt-6">
                    <x-nav-link href="{{ route('collages.index') }}" :active="request()->routeIs('collages.index')">
                        {{ __('Back to Collages') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
