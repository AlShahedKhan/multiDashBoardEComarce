<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-end">
                    <x-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.index')"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition"
                        style="visibility: visible;">
                        {{ __('Back') }}
                    </x-nav-link>
                </div>

                <div class="mt-6">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
                            @error('name')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                value="{{ old('email', $user->email) }}" readonly />
                            <input type="hidden" name="email" value="{{ $user->email }}" />
                        </div>

                        <div>
                            <x-label for="password" value="{{ __('Password') }}" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                                autocomplete="new-password" />
                            @error('password')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <x-label for="role" value="{{ __('Role') }}" />
                            <select name="roles[]" id="role" multiple
                                class="block mt-1 w-full border-gray-300 bg-white focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm text-gray-700">
                                <option value="" disabled>{{ __('Select Role') }}</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}"
                                        {{ in_array($role->name, $userRoles) ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('roles')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        @can('user_update')
                            <x-button class="mt-4">
                                {{ __('Update') }}
                            </x-button>
                        @endcan
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
