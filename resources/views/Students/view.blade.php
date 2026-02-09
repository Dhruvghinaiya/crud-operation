@extends('layout.app')

@section('title', 'View Student')
@section('page-title', 'Student Details')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-xl shadow-lg p-6">
    <div class="flex justify-end ">
        <a href="{{ route('students.index') }}"
           class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 text-gray-700">Back</a>
    </div>

    <div class="grid grid-cols-2 gap-6 mb-4">
        <div class="font-semibold">First Name:</div>
        <div>{{ $student->firstname }}</div>

        <div class="font-semibold">Last Name:</div>
        <div>{{ $student->lastname }}</div>

        <div class="font-semibold">Email:</div>
        <div>{{ $student->email }}</div>

        <div class="font-semibold">Mobile:</div>
        <div>{{ $student->mobile }}</div>

        <div class="font-semibold">Course:</div>
        <div>{{ $student->course->name ?? '-' }}</div>

        <div class="font-semibold">Gender:</div>
        <div>{{ ucfirst($student->gender) }}</div>

        <div class="font-semibold">DOB:</div>
        <div>{{ $student->dob }}</div>

        <div class="font-semibold">Status:</div>
        <div>
            @if ($student->is_active)
                <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full">Active</span>
            @else
                <span class="bg-red-100 text-red-700 text-xs px-3 py-1 rounded-full">Inactive</span>
            @endif
        </div>

        @if ($student->avatar)
            <div class="font-semibold">Profile Image:</div>
            <div>
                <img src="{{ asset('storage/' . $student->avatar) }}" alt="Avatar" class="h-28 w-28 rounded-full object-cover">
            </div>
        @endif
    </div>

  
</div>


@endsection
