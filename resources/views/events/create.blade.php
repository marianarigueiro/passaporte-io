<h1>➕ Criar Evento</h1>

<h2>Categorias cadastradas</h2>

<ul>
    @foreach($categories as $category)
        <li>{{ $category->name }}</li>
    @endforeach
</ul>