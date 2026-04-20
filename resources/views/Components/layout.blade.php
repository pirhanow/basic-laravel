<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>News Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <header class="bg-primary text-white p-3 mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h4 mb-0">News Portal</h1>
            <nav class="d-flex gap-2">
                <x-nav-link href="/">Home</x-nav-link>
                <x-nav-link href="/about">About</x-nav-link>
                <x-nav-link href="/contact">Contact</x-nav-link>
                <x-nav-link href="/post">Post</x-nav-link>
                <x-nav-link href="/create">Add</x-nav-link>
                @auth
                    @if(auth()->user()->role === 'admin')
                        <x-nav-link href="/admin/post">Admin</x-nav-link>
                    @endif
                @endauth
            </nav>
        </div>
    </header>

    <main class="container">
        @yield('content')
    </main>

    <footer class="bg-light text-center py-3 mt-4">
        &copy; 2026 News Portal
    </footer>
</body>
</html>
