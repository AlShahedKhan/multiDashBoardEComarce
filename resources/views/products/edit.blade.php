<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('products.update', $product) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Product Name') }}</label>
                        <input type="text" name="name" id="name" value="{{ $product->name }}" class="mt-1 block w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="collage_id" class="block text-sm font-medium text-gray-700">{{ __('Collage') }}</label>
                        <select name="collage_id" id="collage_id" class="mt-1 block w-full" required>
                            @foreach($collages as $collage)
                                <option value="{{ $collage->id }}" {{ $collage->id == $product->collage_id ? 'selected' : '' }}>
                                    {{ $collage->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">
                        {{ __('Update Product') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
