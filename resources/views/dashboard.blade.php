<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Profile Section -->
            <div class="mb-8 bg-gradient-to-r from-purple-500 to-blue-600 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8 sm:flex items-center justify-between">
                    <div class="flex flex-col sm:flex-row items-center mb-6 sm:mb-0">
                        <!-- Profile Photo - Ganti URL dengan foto Anda -->
                        <div class="relative">
                            <img src="https://www.jktliving.com/blog/wp-content/uploads/2024/04/Foto-Animasi-Cowok-Keren-300x300.jpg" alt="Profile Photo" 
                                class="h-32 w-32 rounded-full border-4 border-white shadow-md object-cover">
                            <div class="absolute bottom-0 right-0 h-5 w-5 rounded-full bg-green-500 border-2 border-white"></div>
                        </div>
                        <div class="mt-4 sm:mt-0 sm:ml-6 text-center sm:text-left">
                            <h1 class="text-2xl font-bold text-white">{{ Auth::user()->name }}</h1>
                            <p class="text-white text-sm mt-100">{{ Auth::user()->email }}</p>
                            <p class="mt-2 text-white dark:text-gray-100 text-sm">
                                Member sejak {{ Auth::user()->created_at->format('d M Y') }}
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 mt-6 sm:mt-0">
                        <a href="{{ route('profile.edit') }}" 
                            class="inline-flex items-center justify-center px-4 py-2 bg-white bg-opacity-20 border border-transparent rounded-md font-semibold text-white hover:bg-opacity-30 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-blue-500 focus:ring-white transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit Profil
                        </a>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Tasks Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg border border-gray-200 dark:border-gray-700 transition-all hover:shadow-md">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-500 bg-opacity-10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Tugas</p>
                                <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                                    {{ App\Models\Todo::where('user_id', Auth::id())->count() }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Completed Tasks Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg border border-gray-200 dark:border-gray-700 transition-all hover:shadow-md">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-500 bg-opacity-10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Tugas Selesai</p>
                                <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                                    {{ App\Models\Todo::where('user_id', Auth::id())->where('is_done', true)->count() }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ongoing Tasks Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg border border-gray-200 dark:border-gray-700 transition-all hover:shadow-md">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-yellow-500 bg-opacity-10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Tugas Berlangsung</p>
                                <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                                    {{ App\Models\Todo::where('user_id', Auth::id())->where('is_done', false)->count() }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Completion Rate Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg border border-gray-200 dark:border-gray-700 transition-all hover:shadow-md">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-purple-500 bg-opacity-10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Tingkat Penyelesaian</p>
                                @php
                                    $total = App\Models\Todo::where('user_id', Auth::id())->count();
                                    $completed = App\Models\Todo::where('user_id', Auth::id())->where('is_done', true)->count();
                                    $rate = $total > 0 ? round(($completed / $total) * 100) : 0;
                                @endphp
                                <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">{{ $rate }}%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions & Recent Tasks -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Quick Actions -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg border border-gray-200 dark:border-gray-700">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Aksi Cepat</h3>
                        <div class="space-y-3">
                            <a href="{{ route('todo.create') }}" class="flex items-center p-3 text-base font-medium text-gray-700 dark:text-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 group transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                <span>Tambah Tugas Baru</span>
                            </a>
                            <a href="{{ route('todo.index') }}" class="flex items-center p-3 text-base font-medium text-gray-700 dark:text-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 group transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                <span>Lihat Semua Tugas</span>
                            </a>
                            @if(App\Models\Todo::where('user_id', Auth::id())->where('is_done', true)->count() > 0)
                                <form action="{{ route('todo.deletecompleted') }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full flex items-center p-3 text-base font-medium text-gray-700 dark:text-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 group transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        <span>Hapus Semua Tugas Selesai</span>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Recent Tasks -->
                <div class="lg:col-span-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg border border-gray-200 dark:border-gray-700">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Tugas Terbaru</h3>
                        <div class="overflow-x-auto">
                            @php
                                $recentTodos = App\Models\Todo::where('user_id', Auth::id())
                                    ->orderBy('created_at', 'desc')
                                    ->take(5)
                                    ->get();
                            @endphp

                            @if($recentTodos->count() > 0)
                                <div class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach($recentTodos as $todo)
                                        <div class="py-3 flex items-center justify-between">
                                            <div class="flex items-center">
                                                @if($todo->is_done)
                                                    <span class="flex h-8 w-8 rounded-full bg-green-100 dark:bg-green-900 items-center justify-center mr-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 dark:text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </span>
                                                @else
                                                    <span class="flex h-8 w-8 rounded-full bg-yellow-100 dark:bg-yellow-900 items-center justify-center mr-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 dark:text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </span>
                                                @endif
                                                <div>
                                                    <p class="text-sm font-medium text-gray-700 dark:text-gray-200 truncate max-w-xs">{{ $todo->title }}</p>
                                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $todo->created_at->diffForHumans() }}</p>
                                                </div>
                                            </div>
                                            <div class="flex space-x-2">
                                                <a href="{{ route('todo.edit', $todo) }}" class="text-blue-500 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="mt-4 text-center">
                                    <a href="{{ route('todo.index') }}" class="text-sm text-blue-500 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300">Lihat semua tugas →</a>
                                </div>
                            @else
                                <div class="text-center py-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                    <p class="text-gray-500 dark:text-gray-400">Belum ada tugas. Mulai tambahkan tugas baru!</p>
                                    <a href="{{ route('todo.create') }}" class="mt-3 inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition">
                                        Tambah Tugas
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Productivity Chart -->
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Produktivitas Mingguan</h3>
                    <div class="h-64 flex items-center justify-center">
                        <p class="text-gray-500 dark:text-gray-400 text-center">
                            Grafik produktivitas akan ditampilkan di sini.<br>
                            <span class="text-sm">Implementasikan dengan Chart.js atau library grafik lainnya.</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>