@extends('layouts.app')

@section('content')
    @php
        $profileData = $profile ?? null;
        $displayName = $profileData->name ?? 'Youssef Estafanous';
        $roleTitle = $profileData->role_title ?? 'Software Developer (MBO 4)';
        $phone = $profileData->phone ?? '06 84429070';
        $email = $profileData->email ?? 'Youssef03040@outlook.com';
        $github = $profileData->github_url ?? 'https://github.com/youssef03040/projecten';
        $linkedin = $profileData->linkedin_url ?? 'https://www.linkedin.com/in/b85227302/';
        $bio = $profileData->bio ?? 'Mijn naam is Youssef Estafanous, een gedreven Software Development student aan het ROC van Amsterdam. Met een passie voor webontwikkeling, game development en databases werk ik doelgericht en efficiënt aan innovatieve oplossingen. Ik hou van een directe, no-nonsense aanpak en waardeer een open en toegankelijke werkomgeving. Naast mijn technische vaardigheden breng ik energie en een positieve sfeer in een team. Ik ben leergierig, werk graag samen en zoek altijd naar praktische en slimme oplossingen. Klaar om impact te maken met code en creativiteit!';

        $languages = $profileData && $profileData->languages
            ? array_filter(preg_split('/[\r\n,]+/', $profileData->languages))
            : ['Nederlands', 'Engels'];
        $hobbies = $profileData && $profileData->hobbies
            ? array_filter(preg_split('/[\r\n,]+/', $profileData->hobbies))
            : ['Sporten (fitness)', 'Gamen', 'Programmeren'];
        $interests = $profileData && $profileData->interests
            ? array_filter(preg_split('/[\r\n,]+/', $profileData->interests))
            : ['Programmeren', 'Sporten'];
        $skills = $profileData && $profileData->skills
            ? array_filter(preg_split('/[\r\n,]+/', $profileData->skills))
            : ['Leergierig', 'Communicatief', 'Probleemoplossend vermogen', 'Flexibiliteit', 'Stressbestendig'];
        $education = $profileData && $profileData->education
            ? array_filter(preg_split('/[\r\n]+/', $profileData->education))
            : [
                'ROC van Amsterdam — Software Developer, MBO 4 (2024 - heden)',
                'ROC van Amsterdam — Dienstverlening On The Job, MBO 1 & 2 (2022 - 2024)',
            ];
        $workExperience = $profileData && $profileData->work_experience
            ? array_filter(preg_split('/[\r\n]+/', $profileData->work_experience))
            : [
                'Smullers — Horecamedewerker (Utrecht, 2024 - heden)',
                'Inntel Hotels — Food & Beverage (Utrecht, 2022 - 2023)',
                'Pathé — Bioscoopmedewerker (Utrecht, 2020 - 2022)',
                'Action — Vakkenvuller/Kassamedewerker (Utrecht, 2020 - 2021)',
            ];
        $techStack = $profileData && $profileData->tech_stack
            ? array_filter(preg_split('/[\r\n,]+/', $profileData->tech_stack))
            : ['PHP', 'JavaScript', 'SQL', 'C#', 'Unity', 'HTML', 'CSS', 'Laravel', 'React'];
    @endphp

    <div class="py-3">
        <p class="lead text-muted">Welkom op mijn portfolio</p>
    </div>

    <section class="mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <p class="card-text">{!! nl2br(e($bio)) !!}</p>
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
                    <a href="{{ $linkedin }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary">Bekijk mijn LinkedIn</a>
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
            <div class="card-footer d-flex flex-column flex-md-row gap-2 gap-md-0 justify-content-between align-items-md-center">
                <small class="text-muted">Tech: Blazor, .NET, C#, PHP, HTML, Flutter, Laravel</small>
                <a href="{{ $github }}" class="btn btn-sm btn-primary" target="_blank" rel="noopener noreferrer">Bekijk repository</a>
            </div>
        </div>
    </section>

    <section class="mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <h5 class="card-title">Contact</h5>
                        <ul class="list-unstyled mb-0">
                            <li><strong>Naam:</strong> {{ $displayName }}</li>
                            <li><strong>Rol:</strong> {{ $roleTitle }}</li>
                            <li><strong>Telefoon:</strong> {{ $phone }}</li>
                            <li><strong>E-mail:</strong> <a href="mailto:{{ $email }}">{{ $email }}</a></li>
                            <li><strong>GitHub:</strong> <a href="{{ $github }}" target="_blank" rel="noopener noreferrer">{{ parse_url($github, PHP_URL_HOST) ? str_replace(['https://', 'http://'], '', $github) : $github }}</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h5 class="card-title">Talen &amp; Interesses</h5>
                        <div class="mb-2">
                            <strong>Talen:</strong>
                            <span class="d-block">{{ implode(', ', $languages) }}</span>
                        </div>
                        <div class="mb-2">
                            <strong>Hobby's:</strong>
                            <span class="d-block">{{ implode(', ', $hobbies) }}</span>
                        </div>
                        <div class="mb-2">
                            <strong>Interesses:</strong>
                            <span class="d-block">{{ implode(', ', $interests) }}</span>
                        </div>
                        <div>
                            <strong>Vaardigheden:</strong>
                            <span class="d-block">{{ implode(', ', $skills) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <h5 class="card-title">Opleidingen</h5>
                        <ul class="list-group list-group-flush">
                            @foreach ($education as $item)
                                <li class="list-group-item px-0">{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="card-title">Werkervaring</h5>
                        <ul class="list-group list-group-flush">
                            @foreach ($workExperience as $item)
                                <li class="list-group-item px-0">{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Programmeertalen &amp; Tools</h5>
                <p class="mb-0">{{ implode(', ', $techStack) }}</p>
            </div>
        </div>
    </section>
@endsection
