<h1>📅 Lista de Eventos</h1>

@if($events->count())
    @foreach($events as $event)
        <div>
            <h3>{{ $event->title }}</h3>

            <p>Categoria:
                {{ $event->category?->name }}
            </p>

            <p>Organizador:
                {{ $event->organizer?->name }}
            </p>

            <hr>
        </div>
    @endforeach
@else
    <p>Nenhum evento cadastrado.</p>
@endif