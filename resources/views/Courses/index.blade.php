@extends('layout.app')

@section('title', 'Courses')
@section('page-title', 'Course Management')

@section('content')

    <div class="flex justify-end mb-4 space-x-3">
        <form method="GET" action="{{ route('courses.index') }}" class="flex items-center gap-2 ">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search courses "
                class="px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-indigo-200 focus:border-indigo-500 w-full max-w-sm">

            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Search</button>

            @if (request('search'))
                <a href="{{ route('courses.index') }}" class="text-gray-600 hover:text-gray-900 underline ml-2">Reset</a>
            @endif
        </form>
        <a href="{{ route('courses.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
            + Add Course
        </a>


    </div>

    <div class="overflow-x-auto">
        <div class="border border-gray-200 rounded-lg">
            <table class="w-full table-fixed">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600 w-1/3">Course Name</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600 w-1/3">Description</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-600 w-1/3">Actions</th>
                    </tr>
                </thead>
            </table>

            <div class="max-h-[500px] overflow-y-auto scrollbar-hide">
                <table class="w-full table-fixed">
                    <tbody class="divide-y divide-gray-400">
                        @forelse ($courses as $course)
                            <tr class="hover:bg-gray-200">
                                <td class="px-4 py-3 w-1/3">{{ $course->name }}</td>
                                <td class="px-4 py-3 w-1/3">{{ $course->description }}</td>
                                <td class="px-4 py-3 w-1/3 text-center space-x-2">
                                    <a href="{{ route('courses.edit', $course->id) }}" class="text-blue-600">Edit</a>
                                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600" onclick="return confirm('Delete this course?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-4 text-gray-500">
                                    No courses found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4">
            {{ $courses->links('pagination::tailwind') }}
        </div>
    </div>

@endsection
