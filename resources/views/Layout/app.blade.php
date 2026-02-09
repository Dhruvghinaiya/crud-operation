<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Admin')</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen">

    <!-- HEADER FIRST -->
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

    <!-- PAGE CONTENT -->
    <main class="max-w-7xl mx-auto px-4 py-6">

        <h1 class="text-2xl font-bold text-gray-700 mb-6">
            @yield('page-title')
        </h1>

        <div class=" rounded-xl  ">
            @yield('content')
        </div>

    </main>

</body>
</html>
