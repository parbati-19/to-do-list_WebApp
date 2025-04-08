<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-bold mb-4">Create</h3>

                    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Title Field -->
                        <div class="mb-4">
                            <label for="title" class="block text-gray-800 dark:text-gray-100 mb-1">Title</label>
                            <input type="text" name="title" value="{{ $task->title }}"
                                   class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded bg-white text-black dark:bg-gray-700 dark:text-white" />
                        </div>

                        <!-- Description Field -->
                        <div class="mb-4">
                            <label for="Description" class="block text-gray-800 dark:text-gray-100 mb-1">Description</label>
                            <textarea name="Description"
                                      class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded bg-white text-black dark:bg-gray-700 dark:text-white">{{ $task->Description }}</textarea>
                        </div>

                        <!-- Status Field -->
                        <div class="mb-4">
                            <label for="status" class="block text-gray-800 dark:text-gray-100 mb-1">Status</label>
                            <select name="status" id="status"
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded bg-white text-black dark:bg-gray-700 dark:text-white">
                                <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="In Progress" {{ $task->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                            Update Task
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
