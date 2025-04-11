<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-bold mb-4">Create Task</h3>

                    <form method="POST" action="{{ route('tasks.store') }}">
                        @csrf
                    
                        <div class="mb-4">
                            <label for="title" class="block text-gray-800 dark:text-gray-100 mb-1">Title</label>
                            <input type="text" name="title" id="title" required
                                class="w-full rounded border border-gray-300 dark:border-gray-600 bg-white text-black dark:bg-gray-700 dark:text-white px-4 py-2">
                        </div>
                    
                        <div class="mb-4">
                            <label for="description" class="block text-gray-800 dark:text-gray-100 mb-1">Description</label>
                            <textarea name="description" id="description"
                                class="w-full rounded border border-gray-300 dark:border-gray-600 bg-white text-black dark:bg-gray-700 dark:text-white px-4 py-2"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="due_date" class="block text-gray-800 dark:text-gray-100 mb-1">Due Date</label>
                            <input type="date" name="due_date" id="due_date"
                                class="w-full rounded border border-gray-300 dark:border-gray-600 bg-white text-black dark:bg-gray-700 dark:text-white px-4 py-2">
                        </div>

                        <div class="mb-4">
                            <label for="label" class="block text-gray-800 dark:text-gray-100 mb-1">Label</label>
                            <input type="text" name="label" id="label" placeholder="Optional label"
                                class="w-full rounded border border-gray-300 dark:border-gray-600 bg-white text-black dark:bg-gray-700 dark:text-white px-4 py-2">
                        </div>
                    
                        <div class="mb-4">
                            <label for="status" class="block text-gray-800 dark:text-gray-100 mb-1">Status</label>
                            <select name="status" id="status"
                                class="w-full rounded border border-gray-300 dark:border-gray-600 bg-white text-black dark:bg-gray-700 dark:text-white px-4 py-2">
                                <option value="Pending">Pending</option>
                                <option value="In_Progress">In Progress</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                    
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                            Create Task
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
