@extends('layout.app')

@section('title', 'Add Student')
@section('page-title', 'Add New Student')

@section('content')

    <div class="min-h-[70vh] flex items-center justify-center">
        <div class="w-full max-w-5xl bg-white rounded-xl shadow-lg p-8">

            <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">First Name <span
                                class="text-red-600">*</span></label>
                        <input type="text" name="firstname" value="{{ old('firstname') }}" placeholder="Enter first name"
                            class="w-full rounded-lg border border-gray-300 p-2 focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                        @error('firstname')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Last Name <span
                                class="text-red-600">*</span></label>
                        <input type="text" name="lastname" value="{{ old('lastname') }}" placeholder="Enter last name"
                            class="w-full rounded-lg border border-gray-300 p-2 focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                        @error('lastname')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email <span
                                class="text-red-600">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter email"
                            class="w-full rounded-lg border border-gray-300 p-2 focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Mobile <span
                                class="text-red-600">*</span></label>
                        <input type="text" name="mobile" value="{{ old('mobile') }}" placeholder="Enter mobile"
                            class="w-full rounded-lg border border-gray-300 p-2 focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                        @error('mobile')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Course <span
                                class="text-red-600">*</span></label>
                        <select name="course_id"
                            class="w-full rounded-lg border border-gray-300 p-2 focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                            <option value="">Select Course</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}"
                                    {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                    {{ $course->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('course_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Gender <span
                                class="text-red-600">*</span></label>
                        <div class="flex gap-6 mt-1">
                            <label class="flex items-center gap-2 text-sm">
                                <input type="radio" name="gender" value="male"
                                    {{ old('gender') == 'male' ? 'checked' : '' }}> Male
                            </label>
                            <label class="flex items-center gap-2 text-sm">
                                <input type="radio" name="gender" value="female"
                                    {{ old('gender') == 'female' ? 'checked' : '' }}> Female
                            </label>
                        </div>
                        @error('gender')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Date of Birth <span
                                class="text-red-600">*</span></label>
                        <input type="date" name="dob" value="{{ old('dob') }}"
                            class="w-full rounded-lg border border-gray-300 p-2 focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                        @error('dob')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="flex-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Profile Image
                            </label>
                            <input type="file" name="avatar" id="avatar"
                                class="w-full text-sm text-gray-600
                   file:bg-indigo-50 file:text-indigo-700
                   file:px-4 file:py-2 file:rounded-lg file:border-0">
                        </div>

                        <div>
                            <img id="avatarPreview"
                                src="{{ isset($student) && $student->avatar ? asset('storage/' . $student->avatar) : '' }}"
                                class="h-20 w-20 rounded-full object-cover {{ isset($student) && $student->avatar ? '' : 'hidden' }}">
                        </div>
                    </div>

                    <script>
                        const avatarInput = document.getElementById('avatar');
                        const avatarPreview = document.getElementById('avatarPreview');

                        avatarInput.addEventListener('change', function() {
                            const [file] = avatarInput.files;
                            if (file) {
                                avatarPreview.src = URL.createObjectURL(file);
                                avatarPreview.classList.remove('hidden');
                            }
                        });
                    </script>
                </div>


                <div class="flex justify-end gap-3 pt-2">
                    <a href="{{ route('students.index') }}"
                        class="px-4 py-2 rounded-lg border text-gray-600 hover:bg-gray-100">Cancel</a>
                    <button type="submit" class="px-6 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700">Save
                        Student</button>
                </div>
            </form>

        </div>
    </div>

@endsection
