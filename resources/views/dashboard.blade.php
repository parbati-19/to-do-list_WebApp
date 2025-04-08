<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <!-- 🌗 Dark/Light Toggle Switch -->
            <div class="ml-auto" x-data="{ darkMode: localStorage.getItem('theme') === 'dark' }" x-init="() => {
                 if (darkMode) {
                     document.documentElement.classList.add('dark');
                 } else {
                     document.documentElement.classList.remove('dark');
                 }
             }" x-on:change="() => {
                 document.documentElement.classList.toggle('dark', darkMode);
                 localStorage.setItem('theme', darkMode ? 'dark' : 'light');
             }">
                <label for="dark-mode-toggle" class="flex items-center cursor-pointer">
                    <!-- Slider -->
                    <div class="relative">
                        <input type="checkbox" id="dark-mode-toggle" x-model="darkMode" class="hidden" />
                        <div class="block bg-gray-400 dark:bg-gray-600 w-14 h-8 rounded-full"></div>
                        <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition-all duration-200 ease-in-out"
                            :class="darkMode ? 'translate-x-full bg-black' : ''"></div>
                    </div>
                </label>
            </div>

        </div>
    </x-slot>

    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white h-screen">
            <div class="p-4">
                <h3 class="text-lg font-semibold">Navigation</h3>
                <ul class="mt-4">
                    <!-- Task Button -->
                    <li>
                        <a href="{{ route('tasks.index') }}"
                            class="block py-2 px-4 hover:bg-gray-700 hover:underline hover:text-red-400 rounded-md">
                            Task
                        </a>
                    </li>
                    <!-- Add other navigation items here -->
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6 bg-gray-100 dark:bg-gray-900">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>