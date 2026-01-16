@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h1 class="h3 mb-3">Jouw profiel</h1>
                    <p class="text-muted">Status: {{ $user->is_approved ? 'Goedgekeurd' : 'In afwachting van goedkeuring' }}</p>
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Naam</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="role_title" class="form-label">Functie / Titel</label>
                                <input type="text" id="role_title" name="role_title" class="form-control" value="{{ old('role_title', $user->role_title) }}" placeholder="Software Developer">
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Telefoon</label>
                                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}" placeholder="06 12345678">
                            </div>
                            <div class="col-md-6">
                                <label for="portfolio_url" class="form-label">Portfolio link</label>
                                <input type="url" id="portfolio_url" name="portfolio_url" class="form-control" value="{{ old('portfolio_url', $user->portfolio_url) }}" placeholder="https://voorbeeld.nl">
                            </div>
                            <div class="col-md-6">
                                <label for="linkedin_url" class="form-label">LinkedIn link</label>
                                <input type="url" id="linkedin_url" name="linkedin_url" class="form-control" value="{{ old('linkedin_url', $user->linkedin_url) }}" placeholder="https://linkedin.com/in/...">
                            </div>
                            <div class="col-md-6">
                                <label for="github_url" class="form-label">GitHub link</label>
                                <input type="url" id="github_url" name="github_url" class="form-control" value="{{ old('github_url', $user->github_url) }}" placeholder="https://github.com/...">
                            </div>
                            <div class="col-12">
                                <label for="bio" class="form-label">Over jou</label>
                                <textarea id="bio" name="bio" class="form-control" rows="4">{{ old('bio', $user->bio) }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="languages" class="form-label">Talen</label>
                                <textarea id="languages" name="languages" class="form-control" rows="3" placeholder="Bijv.: Nederlands, Engels">{{ old('languages', $user->languages) }}</textarea>
                                <div class="form-text">Gebruik komma's of nieuwe regels voor meerdere items.</div>
                            </div>
                            <div class="col-md-6">
                                <label for="hobbies" class="form-label">Hobby's</label>
                                <textarea id="hobbies" name="hobbies" class="form-control" rows="3" placeholder="Bijv.: Sporten, Gamen">{{ old('hobbies', $user->hobbies) }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="interests" class="form-label">Interesses</label>
                                <textarea id="interests" name="interests" class="form-control" rows="3">{{ old('interests', $user->interests) }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="skills" class="form-label">Vaardigheden</label>
                                <textarea id="skills" name="skills" class="form-control" rows="3">{{ old('skills', $user->skills) }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="education" class="form-label">Opleidingen</label>
                                <textarea id="education" name="education" class="form-control" rows="4" placeholder="Elke opleiding op een nieuwe regel">{{ old('education', $user->education) }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="work_experience" class="form-label">Werkervaring</label>
                                <textarea id="work_experience" name="work_experience" class="form-control" rows="4" placeholder="Elke ervaring op een nieuwe regel">{{ old('work_experience', $user->work_experience) }}</textarea>
                            </div>
                            <div class="col-12">
                                <label for="tech_stack" class="form-label">Programmeertalen &amp; Tools</label>
                                <textarea id="tech_stack" name="tech_stack" class="form-control" rows="3" placeholder="Bijv.: PHP, JavaScript, Laravel">{{ old('tech_stack', $user->tech_stack) }}</textarea>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-success">Opslaan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="h5">Snelle acties</h2>
                    <p class="mb-1"><strong>Laatste update:</strong> {{ $user->updated_at?->diffForHumans() }}</p>
                    <p class="mb-0"><strong>Aangemaakt:</strong> {{ $user->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
