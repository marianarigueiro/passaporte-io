<h1>✏️ Editar Evento</h1>

<p>Editando:</p>

<h2>{{ $event->title }}</h2>

<h3>Categorias disponíveis</h3>

<ul>
    @foreach($categories as $category)
        <li>{{ $category->name }}</li>
    @endforeach
</ul>