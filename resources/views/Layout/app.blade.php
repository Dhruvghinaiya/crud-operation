<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin')</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen">

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

    <main class="max-w-7xl mx-auto px-4 py-6">

        <div>

            <div class="flex justify-between">

                <h1 class="text-2xl font-bold text-gray-700 ">
                    @yield('page-title')
                </h1>
                @if (session('success'))
                    <div id="success-msg" class="mb-4 px-4 py-2 rounded bg-green-100 text-green-700 text-sm">
                        {{ session('success') }}
                    </div>

                    <script>
                        setTimeout(function() {
                            let msg = document.getElementById('success-msg');
                            if (msg) {
                                msg.style.transition = 'opacity 0.5s';
                                msg.style.opacity = 0;
                                setTimeout(() => msg.remove(), 500);
                            }
                        }, 3000);
                    </script>
                @endif
            </div>

            <div class=" rounded-xl  ">

                @yield('content')

            </div>


    </main>

</body>

</html>
