<section id="projects">
    @php
        $projects = [
            [
                'name' => 'sportivityapp',
                'visibility' => 'Public',
                'description' => 'Stageopdracht waarin een sportplatform wordt ontwikkeld met TypeScript en moderne tooling.',
                'tech' => 'TypeScript',
                'updated' => 'Bijgewerkt 4 dagen geleden',
                'url' => 'https://github.com/youssef03040/sportivityapp',
            ],
            [
                'name' => 'Name_Expolore',
                'visibility' => 'Public',
                'description' => 'Babynamen verkennen met filters en inspiratie voor ouders in spe.',
                'tech' => 'PHP',
                'updated' => 'Bijgewerkt 5 dagen geleden',
                'url' => 'https://github.com/youssef03040/Name_Expolore',
            ],
            [
                'name' => 'per_diary',
                'visibility' => 'Public',
                'description' => 'Een persoonlijk dagboek waar gebruikers notities kunnen vastleggen wanneer dat nodig is.',
                'tech' => 'PHP',
                'updated' => 'Bijgewerkt op 7 december 2025',
                'url' => 'https://github.com/youssef03040/per_diary',
            ],
            [
                'name' => 'Oriental_heilig',
                'visibility' => 'Public',
                'description' => 'Website met informatie over heiligen binnen de oriëntaals-orthodoxe kerk en hun herkomst.',
                'tech' => 'Blade',
                'updated' => 'Bijgewerkt op 15 november 2025',
                'url' => 'https://github.com/youssef03040/Oriental_heilig',
            ],
            [
                'name' => 'pizzaplace-blazor',
                'visibility' => 'Public',
                'description' => 'Blazor-demo voor een pizzazaak met componentgebaseerde UI en bestellogica.',
                'tech' => 'HTML / Blazor',
                'updated' => 'Bijgewerkt op 28 oktober 2025',
                'url' => 'https://github.com/youssef03040/pizzaplace-blazor',
            ],
            [
                'name' => 'Protofolio',
                'visibility' => 'Public',
                'description' => 'De portfolio-site waarin projecten, vaardigheden en ervaring worden samengebracht.',
                'tech' => 'PHP',
                'updated' => 'Bijgewerkt op 19 oktober 2025',
                'url' => 'https://github.com/youssef03040/Protofolio',
            ],
            [
                'name' => 'productenbeheer',
                'visibility' => 'Public',
                'description' => 'Beheerplatform met CRUD-functionaliteit voor producten, categorieën en voorraad.',
                'tech' => 'PHP, PDO, MySQL',
                'updated' => 'Bijgewerkt op 10 oktober 2025',
                'url' => 'https://github.com/youssef03040/productenbeheer',
            ],
            [
                'name' => 'Todo-Blazor-',
                'visibility' => 'Public',
                'description' => 'Een Blazor-to-do app met focus op styling en componenthergebruik.',
                'tech' => 'CSS / Blazor',
                'updated' => 'Bijgewerkt op 24 september 2025',
                'url' => 'https://github.com/youssef03040/Todo-Blazor-',
            ],
        ];
    @endphp

    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
        @foreach ($projects as $project)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="card-title mb-0">{{ $project['name'] }}</h5>
                            <span class="badge bg-secondary">{{ $project['visibility'] }}</span>
                        </div>
                        <p class="card-text flex-grow-1">{{ $project['description'] }}</p>
                    </div>
                    <div class="card-footer d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2">
                        <div class="small text-muted">
                            <div><strong>Tech:</strong> {{ $project['tech'] }}</div>
                            <div>{{ $project['updated'] }}</div>
                        </div>
                        <a href="{{ $project['url'] }}" class="btn btn-sm btn-primary" target="_blank" rel="noopener noreferrer">Bekijk repository</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
