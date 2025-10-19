<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
            </style>
        @endif
    </head>
    <body class="bg-light text-dark">

        <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">youssef estafanous</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link text-white" href="/projects">Projects</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container" style="padding-top:80px;padding-bottom:80px;min-height:70vh;">
            <div class="py-3">
                <p class="lead text-muted">Welkom op mijn portfolio</p>
            </div>

            <section class="mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <p class="card-text">Mijn naam is <strong>Youssef Estafanous</strong>, een gedreven Software Development student aan het ROC van Amsterdam. Met een passie voor webontwikkeling, game development en databases werk ik doelgericht en efficiënt aan innovatieve oplossingen. Ik hou van een directe, no-nonsense aanpak en waardeer een open en toegankelijke werkomgeving. Naast mijn technische vaardigheden breng ik energie en een positieve sfeer in een team. Ik ben leergierig, werk graag samen en zoek altijd naar praktische en slimme oplossingen. Klaar om impact te maken met code en creativiteit!</p>
                    </div>
                </div>
            </section>

            <section class="mb-4">
                <div class="card">
                    <div class="card-body d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                        <div>
                            <h5 class="card-title">LinkedIn</h5>
                            <p class="card-text text-muted">Connect met mij op LinkedIn</p>
                        </div>
                        <div class="mt-3 mt-md-0">
                            <a href="https://www.linkedin.com/in/b85227302/" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary">Bekijk mijn LinkedIn</a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">GitHub</h5>
                        <p class="card-text text-muted">Bekijk de repository van het project hieronder:</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <small class="text-muted">Tech: Blazor, .NET, C#, PHP, Html, Flutter, Laravel</small>
                        <a href="https://github.com/youssef03040?tab=repositories" class="btn btn-sm btn-primary" target="_blank" rel="noopener noreferrer">Bekijk repository</a>
                    </div>
                </div>
            </section>

        </main>

        <footer class="bg-light text-center py-3 fixed-bottom border-top">
            <div class="container">© {{ date('Y') }} Alle rechten zijn van youssef</div>
        </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
