<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

@vite('resources/js/app.js')
<head>
    <title>Task app</title>
    <script src="//unpkg.com/alpinejs" defer></script>

    @yield('styles')

</head>

<body class="container p-5 my-5">
<h1 class="text-center mb-4">@yield('title')</h1>
<div x-data="{ flash: true }">
    @if(session()->has('success'))
        <div x-show="flash"
             class="position-relative mb-4 rounded border border-success bg-success bg-opacity-25 px-3 py-2 fs-6 text-success"
             role="alert">
            <strong class="fw-bold">Success!</strong>
            <div>
                {{ session('success')  }}
            </div>
            <span class="position-absolute top-0 end-0 px-2 py-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
               stroke-width="1.5" @click="flash = false"
               stroke="currentColor" class="h-4 w-4 cursor-pointer" height="16" width="16">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </span>
        </div>
    @endif

    @yield('content')
</div>
</body>

</html>

