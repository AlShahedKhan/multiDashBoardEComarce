<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Collages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">

                <!-- Right-Aligned Button to Create Collage -->
                <div class="flex justify-end mb-4">
                    {{-- @can('collage_create') <!-- Make sure the user has permission --> --}}
                        <x-nav-link href="{{ route('collages.create') }}" :active="request()->routeIs('collages.create')"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                            {{ __('Create Collage') }}
                        </x-nav-link>
                    {{-- @endcan --}}
                </div>

                <!-- List of Collages -->
                <div class="mt-6">
                    <table class="min-w-full bg-white dark:bg-gray-800 shadow-md rounded-md">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border-b text-left">{{ __('Collage Name') }}</th>
                                <th class="px-4 py-2 border-b text-left">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($collages as $collage)
                                <tr>
                                    <td class="px-4 py-2 border-b">{{ $collage->name }}</td>
                                    <td class="px-4 py-2 border-b">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('collages.edit', $collage) }}" class="text-blue-600 hover:text-blue-800">{{ __('Edit') }}</a>

                                            <form action="{{ route('collages.destroy', $collage) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800">{{ __('Delete') }}</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
