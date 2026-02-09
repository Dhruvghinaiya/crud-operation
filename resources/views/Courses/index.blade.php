@extends('layout.app')

@section('title', 'Courses')
@section('page-title', 'Course Management')

@section('content')

    <div class="flex justify-end mb-4">
        <a href="{{ route('courses.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
            + Add Course
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200 rounded-lg">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Course Name</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Description</th>
                    <th class="px-4 py-3 text-center text-sm font-semibold text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @foreach ($courses as $course)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium">{{ $course->name }}</td>
                        <td class="px-4 py-3 font-medium">{{ $course->description }}</td>
                        <td class="px-4 py-3 text-center space-x-2">
                            <a href="{{ route('courses.edit', $course->id) }}" class="text-blue-600">Edit</a>

                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button class="text-red-600 " onclick="return confirm('Delete this course?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
