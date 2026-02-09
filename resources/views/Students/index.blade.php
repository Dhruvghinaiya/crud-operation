@extends('layout.app')

@section('title', 'Students')
@section('page-title', 'Student Management')

@section('content')

<div class="flex justify-end mb-4">
    <a href="{{ route('students.create') }}"
       class="bg-blue-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
        + Add Student
    </a>
</div>

<div class="overflow-x-auto">
<table class="w-full border border-gray-200 rounded-lg">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-4 py-3 text-sm font-semibold">#</th>
            <th class="px-4 py-3 text-sm font-semibold">Name</th>
            <th class="px-4 py-3 text-sm font-semibold">Course</th>
            <th class="px-4 py-3 text-sm font-semibold">Gender</th>
            <th class="px-4 py-3 text-sm font-semibold">Status</th>
            <th class="px-4 py-3 text-sm font-semibold text-center">Actions</th>
        </tr>
    </thead>

    <tbody class="divide-y">
        @forelse($students as $student)
        <tr class="hover:bg-gray-50">
            <td class="px-4 py-3">{{ $loop->iteration }}</td>

            <td class="px-4 py-3 font-medium">
                {{ $student->firstname }} {{ $student->lastname }}
            </td>

            <td class="px-4 py-3">
                {{ $student->course->name ?? '-' }}
            </td>

            <td class="px-4 py-3 capitalize">
                {{ $student->gender }}
            </td>

            <td class="px-4 py-3">
                @if($student->is_active)
                    <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full">
                        Active
                    </span>
                @else
                    <span class="bg-red-100 text-red-700 text-xs px-3 py-1 rounded-full">
                        Inactive
                    </span>
                @endif
            </td>

            <td class="px-4 py-3 text-center space-x-2">
                <a href="{{ route('students.edit', $student->id) }}"
                   class="text-blue-600 hover:underline">Edit</a>

                <form action="{{ route('students.destroy', $student->id) }}"
                      method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button class="text-red-600 hover:underline"
                            onclick="return confirm('Delete student?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center py-4 text-gray-500">
                No students found
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
</div>

@endsection
