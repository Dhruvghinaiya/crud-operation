  <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex h-16 items-center justify-between">

                <div class="text-xl font-bold text-indigo-600">
                    Student Admin
                </div>

                <nav class="flex space-x-6">
                    <a href="{{ route('courses.index') }}"
                       class="{{ request()->routeIs('courses.*') 
                            ? 'text-indigo-600 font-semibold border-b-2 border-indigo-600' 
                            : 'text-gray-600 hover:text-indigo-600' }}">
                        Courses
                    </a>

                    <a href="{{ route('students.index') }}"
                       class="{{ request()->routeIs('students.*') 
                            ? 'text-indigo-600 font-semibold border-b-2 border-indigo-600' 
                            : 'text-gray-600 hover:text-indigo-600' }}">
                        Students
                    </a>
                </nav>
            </div>
        </div>
    </header>
