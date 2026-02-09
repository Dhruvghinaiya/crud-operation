@extends('layout.app')

@section('title', 'Add Course')
@section('page-title', 'Add New Course')

@section('content')

    <div class="min-h-[70vh] flex items-center justify-center">

        <!-- FORM CARD -->
        <div class="w-full max-w-xl bg-white rounded-xl shadow-lg p-8">

            <form action="{{ route('courses.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Course Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Course Name
                    </label>

                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter course name"
                        class="w-full rounded-lg border border-gray-300 p-2
                              focus:border-indigo-500 focus:ring focus:ring-indigo-200">

                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Description
                    </label>

                    <textarea name="description" rows="4" placeholder="Enter course description"
                        class="w-full rounded-lg border border-gray-300 p-2
                                 focus:border-indigo-500 focus:ring focus:ring-indigo-200">{{ old('description') }}</textarea>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end gap-3 pt-2">
                    <a href="{{ route('courses.index') }}"
                        class="px-4 py-2 rounded-lg border text-gray-600 hover:bg-gray-100">
                        Cancel
                    </a>

                    <button type="submit" class="px-6 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700">
                        Save Course
                    </button>
                </div>

            </form>

        </div>
    </div>

@endsection
