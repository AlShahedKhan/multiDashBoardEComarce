<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-end mb-4">
                    <x-nav-link href="{{ route('products.create') }}" :active="request()->routeIs('products.create')">
                        {{ __('Create Product') }}
                    </x-nav-link>
                </div>

                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">{{ __('Product Name') }}</th>
                            <th class="px-4 py-2">{{ __('Collage Name') }}</th>
                            <th class="px-4 py-2">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td class="px-4 py-2">{{ $product->name }}</td>
                                <td class="px-4 py-2">{{ $product->collage->name }}</td>
                                <td class="px-4 py-2">
                                    <x-nav-link href="{{ route('products.edit', $product) }}" class="text-blue-600">
                                        {{ __('Edit') }}
                                    </x-nav-link>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600">{{ __('Delete') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
