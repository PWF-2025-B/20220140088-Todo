<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Todo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-xl text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between">
                        <x-create-button href="{{ route('todo.create') }}" />

                        <div>
                            @if (session('success'))
                                <p x-data="{ show: true }" x-show="show" x-transition
                                    x-init="setTimeout(() => show = false, 5000)"
                                    class="text-sm text-green-600 dark:text-green-400">
                                    {{ session('success') }}
                                </p>
                            @endif

                            @if (session('danger'))
                                <p x-data="{ show: true }" x-show="show" x-transition
                                    x-init="setTimeout(() => show = false, 5000)"
                                    class="text-sm text-red-600 dark:text-red-400">
                                    {{ session('danger') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-6 py-3 w-1/3">Title</th>
                                <th class="px-6 py-3 w-1/3">Status</th>
                                <th class="px-6 py-3 w-1/3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($todos as $todo)
                                <tr class="odd:bg-white odd:dark:bg-gray-800 even:bg-gray-50 even:dark:bg-gray-700">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray-100">
                                        <a href="{{ route('todo.edit', $todo) }}" class="hover:underline">
                                            {{ $todo->title }}
                                        </a>
                                    </td>

                                    <td class="px-6 py-4">
                                        @if ($todo->is_done)
                                            <span
                                                class="text-green-600 dark:text-green-400 hover:text-green-900 dark:hover:text-green-200">
                                                Completed
                                            </span>
                                        @else
                                            <span
                                                class="text-yellow-500 dark:text-yellow-400 hover:text-yellow-300 dark:hover:text-yellow-200">
                                                Ongoing
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="flex flex-col md:flex-row gap-2">
                                            @if (!$todo->is_done)
                                                <form action="{{ route('todo.complete', $todo) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit"
                                                        class="text-green-600 dark:text-green-400 hover:text-green-900 dark:hover:text-green-200">
                                                        Complete
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('todo.uncomplete', $todo) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit"
                                                        class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-200">
                                                        Uncomplete
                                                    </button>
                                                </form>
                                            @endif

                                            <form action="{{ route('todo.destroy', $todo) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-600 transition-colors">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white dark:bg-gray-800">
                                    <td colspan="3" class="px-6 py-4 font-medium text-center text-gray-900 dark:text-white">
                                        No todos found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    @if ($todosCompleted > 0)
                        <div class="p-6 text-xl text-gray-900 dark:text-gray-100">
                            <form action="{{ route('todo.deletecompleted') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-primary-button>
                                    Delete All Completed Task
                                </x-primary-button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>