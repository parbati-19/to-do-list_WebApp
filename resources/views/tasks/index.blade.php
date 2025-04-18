<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Tasks') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <h3 class="text-lg font-bold mb-4">Your Tasks</h3>

          @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
        {{ session('success') }}
        </div>
      @endif

          <a href="{{ route('tasks.create') }}"
            class="mb-4 inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 hover:bg-blue-800 text-white font-semibold rounded-xl shadow-md transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path d="M12 4v16m8-8H4" />
            </svg>
            Create Task
          </a>

          <!-- Filter Form -->
          <form method="GET" action="{{ route('tasks.index') }}" class="mb-6 flex gap-2 flex-wrap">
            <select name="status"
              class="min-w-[160px] px-4 py-2 border border-gray-300 dark:border-gray-600 rounded bg-white text-black dark:bg-gray-700 dark:text-white">
              <option value="">All Status</option>
              <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
              <option value="In_Progress" {{ request('status') == 'In_Progress' ? 'selected' : '' }}>In Progress</option>
              <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>

            <input type="text" name="label" placeholder="Filter by label" value="{{ request('label') }}"
              class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded bg-white text-black dark:bg-gray-700 dark:text-white">

            <!-- Sort Options -->
            <select name="sort_by"
              class="min-w-[160px] px-4 py-2 border dark:border-gray-600 rounded bg-white text-black dark:bg-gray-700 dark:text-white">
              <option value="">Sort By</option>
              <option value="title" {{ request('sort_by') == 'title' ? 'selected' : '' }}>Title</option>
              <option value="status" {{ request('sort_by') == 'status' ? 'selected' : '' }}>Status</option>
              <option value="label" {{ request('sort_by') == 'label' ? 'selected' : '' }}>Label</option>
              <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>Created Date</option>
            </select>

            <select name="direction"
              class="min-w-[160px] px-4 py-2 border dark:border-gray-600 rounded bg-white text-black dark:bg-gray-700 dark:text-white">
              <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>Ascending</option>
              <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Descending</option>
            </select>

            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Filter</button>
          </form>

          @if($tasks->isEmpty())
        <p>No tasks available.</p>
      @else
      <table class="min-w-full bg-white dark:bg-gray-800 rounded shadow">
      <thead class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
        <tr>
        <th class="px-6 py-3 text-left">Title</th>
        <th class="px-6 py-3 text-left">Description</th>
        <th class="px-6 py-3 text-left">Label</th>
        <th class="px-6 py-3 text-left">Status</th>
        <th class="px-6 py-3 text-left">Due Date</th>
        <th class="px-6 py-3 text-left">Actions</th>
        </tr>
      </thead>
      <tbody class="text-gray-800 dark:text-gray-100">
        @foreach ($tasks as $task)
      <tr class="border-t border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
      <td class="px-6 py-4">{{ $task->title }}</td>
      <td class="px-6 py-4">{{ $task->description }}</td>
      <td class="px-6 py-4">{{ $task->label ?? '-' }}</td>
      <td class="px-6 py-4">{{ $task->status }}</td>
      <td class="px-6 py-4">{{ $task->due_date ?? '-' }}</td>
      <td class="px-6 py-4 flex gap-2">
        <a href="{{ route('tasks.edit', $task->id) }}"
        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">
        Edit
        </a>
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
        onsubmit="return confirm('Are you sure?')">
        @csrf @method('DELETE')
        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">Delete</button>
        </form>
      </td>
      </tr>
    @endforeach
      </tbody>
      </table>
    @endif
        </div>
      </div>
    </div>
  </div>
</x-app-layout>