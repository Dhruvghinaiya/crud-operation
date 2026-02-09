@extends('layout.app')

@section('title', 'Students')
@section('page-title', 'Student Management')


@section('content')


    <div class="flex justify-end mb-4 space-x-3">

        <form method="GET" action="{{ route('students.index') }}" class="flex items-center gap-2 ">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search students"
                class="px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-indigo-200 focus:border-indigo-500 w-full max-w-sm">

            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Search</button>


        </form>

        <a href="{{ route('students.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
            + Add Student
        </a>
    </div>

    <div class="overflow-x-auto scrollbar-hide">

        <div class="overflow-y-auto max-h-[440px]  scrollbar-hide border border-gray-200 rounded-lg">

            <table class="w-full border-collapse">

                <thead class="bg-gray-50 sticky top-0 z-10">
                    <tr>
                        <th class="px-4 py-3 text-sm font-semibold text-center">Name</th>
                        <th class="px-4 py-3 text-sm font-semibold text-center">Course</th>
                        <th class="px-4 py-3 text-sm font-semibold text-center">Gender</th>
                        <th class="px-4 py-3 text-sm font-semibold text-center">Status</th>
                        <th class="px-4 py-3 text-sm font-semibold text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-400">
                    @forelse($students as $student)
                        <tr class="hover:bg-gray-200">
                            <td class="px-4 py-3 text-center">
                                {{ $student->firstname }} {{ $student->lastname }}
                            </td>
                            <td class="px-4 py-3 text-center">{{ $student->course->name ?? '-' }}</td>
                            <td class="px-4 py-3 capitalize text-center">{{ $student->gender }}</td>
                            <td class="px-4 py-3 text-center">
                                @if ($student->is_active)
                                    <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full">Active</span>
                                @else
                                    <span class="bg-red-100 text-red-700 text-xs px-3 py-1 rounded-full">Inactive</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center space-x-2">
                                <a href="{{ route('students.edit', $student->id) }}" class="text-blue-600">Edit</a>
                                <a href="{{ route('students.show', $student->id) }}" class="text-indigo-600">View</a>

                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600" onclick="return confirm('Delete student?')">Delete</button>
                                </form>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500">No students found</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
        <div class="mt-4">
            {{ $students->links('pagination::tailwind') }}
        </div>
    </div>


@endsection
