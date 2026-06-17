<h1>🔍 Detalhes do Evento</h1>

<p>Título: {{ $event->title }}</p>

<p>Descrição: {{ $event->description }}</p>

<p>Local: {{ $event->location }}</p>

<p>Capacidade: {{ $event->capacity }}</p>

<p>Categoria: {{ $event->category?->name }}</p>

<p>Organizador: {{ $event->organizer?->name }}</p>