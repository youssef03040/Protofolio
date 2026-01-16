<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <script>
            const storedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.dataset.theme = storedTheme;
        </script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            :root {
                color-scheme: light;
                --bg-color: #f8f9fa;
                --text-color: #1f2933;
                --card-bg: #ffffff;
                --card-border: #d0d7de;
                --link-color: #0d6efd;
                --muted-color: #64748b;
                --nav-bg: #0b1f3a;
                --nav-link-color: #ffffff;
                --nav-link-hover: rgba(255, 255, 255, 0.75);
                --btn-bg: #198754;
                --btn-text: #ffffff;
            }

            :root[data-theme='dark'] {
                color-scheme: dark;
                --bg-color: #0b1623;
                --text-color: #e2e8f0;
                --card-bg: #132238;
                --card-border: #1f2f46;
                --link-color: #7cb3ff;
                --muted-color: #94a3b8;
                --nav-bg: #081426;
                --nav-link-color: #e2e8f0;
                --nav-link-hover: rgba(226, 232, 240, 0.7);
                --btn-bg: #2563eb;
                --btn-text: #f8fafc;
            }

            body {
                background-color: var(--bg-color);
                color: var(--text-color);
                transition: background-color 0.2s ease, color 0.2s ease;
            }

            a {
                color: var(--link-color);
            }

            .card {
                background-color: var(--card-bg);
                border-color: var(--card-border);
                transition: background-color 0.2s ease, border-color 0.2s ease, color 0.2s ease;
            }

            .card .card-text,
            .card .card-title,
            .card small,
            .card label {
                color: var(--text-color);
            }

            .bg-navy {
                background-color: var(--nav-bg) !important;
            }

            .navbar.bg-navy .nav-link,
            .navbar.bg-navy .navbar-brand {
                color: var(--nav-link-color) !important;
            }

            .navbar.bg-navy .nav-link:hover,
            .navbar.bg-navy .nav-link:focus {
                color: var(--nav-link-hover) !important;
            }

            .btn-theme-toggle {
                color: var(--nav-link-color);
                border: 1px solid rgba(255, 255, 255, 0.25);
                background: transparent;
                padding: 0.3rem 0.8rem;
                border-radius: 999px;
                font-size: 0.9rem;
            }

            .btn-theme-toggle:hover {
                color: var(--nav-link-hover);
                border-color: rgba(255, 255, 255, 0.4);
            }

            .btn-primary,
            .btn-success {
                background-color: var(--btn-bg);
                border-color: var(--btn-bg);
                color: var(--btn-text);
            }

            .btn-primary:hover,
            .btn-success:hover {
                filter: brightness(1.1);
            }

            .alert {
                background-color: var(--card-bg);
                border-color: var(--card-border);
                color: var(--text-color);
            }

            .form-control,
            .form-select,
            textarea {
                background-color: var(--card-bg);
                border-color: var(--card-border);
                color: var(--text-color);
            }

            .form-control:focus,
            .form-select:focus,
            textarea:focus {
                background-color: var(--card-bg);
                color: var(--text-color);
            }

            .list-group-item {
                background-color: var(--card-bg);
                color: var(--text-color);
                border-color: var(--card-border);
            }

            .text-muted,
            .form-text {
                color: var(--muted-color) !important;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-navy">
            <div class="container">
                <a class="navbar-brand" href="/">{{ config('app.name', 'Portfolio') }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav ms-auto me-3">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/projects">Projects</a></li>
                        @auth
                            <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="nav-item">
                                <form class="d-inline" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="nav-link btn btn-link text-white px-0" type="submit">Uitloggen</button>
                                </form>
                            </li>
                        @endauth
                        @guest
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Inloggen</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registreren</a></li>
                        @endguest
                    </ul>
                    <button id="themeToggle" class="btn-theme-toggle" type="button">Donker</button>
                </div>
            </div>
        </nav>

        <main class="container py-5">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            const toggleBtn = document.getElementById('themeToggle');

            function applyTheme(theme) {
                document.documentElement.dataset.theme = theme;
                localStorage.setItem('theme', theme);
                if (toggleBtn) {
                    toggleBtn.textContent = theme === 'dark' ? 'Licht' : 'Donker';
                }
            }

            applyTheme(document.documentElement.dataset.theme || 'light');

            toggleBtn?.addEventListener('click', () => {
                const nextTheme = document.documentElement.dataset.theme === 'dark' ? 'light' : 'dark';
                applyTheme(nextTheme);
            });
        </script>
    </body>
</html>
