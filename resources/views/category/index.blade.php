<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight">
            {{ __('Todo Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Header Actions --}}
            <div class="flex items-center justify-between">
                {{-- Tombol Create --}}
                <a href="{{ route('category.create') }}"
                    class="bg-transparent border border-white text-white px-4 py-2 rounded-md hover:bg-white hover:text-gray-900 transition">
                    + Create Category
                </a>

                {{-- Notifikasi --}}
                <div class="space-y-1">
                    @if (session('success'))
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                            class="text-sm text-green-300">
                            {{ session('success') }}
                        </p>
                    @endif

                    @if (session('danger'))
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                            class="text-sm text-red-400">
                            {{ session('danger') }}
                        </p>
                    @endif
                </div>
            </div>

            {{-- Daftar Kategori --}}
            <div class="space-y-4">
                @forelse ($categories as $category)
                    <div class="p-4 bg-gray-800 rounded-lg shadow flex justify-between items-center">
                        <div>
                            <a href="{{ route('category.edit', $category) }}"
                                class="text-white text-lg font-semibold hover:underline">
                                {{ $category->title }}
                            </a>
                            <p class="text-sm text-gray-300">Total Todos: {{ $category->todos->count() }}</p>
                        </div>
                        <form action="{{ route('category.destroy', $category) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this category?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-600 hover:bg-red-500 text-white px-4 py-2 rounded-md transition">
                                Delete
                            </button>
                        </form>
                    </div>
                @empty
                    <p class="text-white text-center">No categories found.</p>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>