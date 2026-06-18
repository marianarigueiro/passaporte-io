<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-base-content">Novo Evento</h1>
            <p class="text-base-content/60 text-sm mt-1">Preencha os dados para publicar seu evento.</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-error mb-8 text-sm">
                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                <span>Corrija os erros abaixo para continuar.</span>
            </div>
        @endif

        <div class="card bg-base-100 shadow-xl border border-base-200">
            <div class="card-body p-6 sm:p-8">
                <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    {{-- Título --}}
                    <div class="form-control gap-2">
                        <label for="title" class="label-text font-medium">Título do evento</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" required
                               class="input input-bordered w-full @error('title') input-error @enderror"
                               placeholder="Ex.: Workshop de Laravel">
                        @error('title')<span class="text-error text-xs">{{ $message }}</span>@enderror
                    </div>

                    {{-- Descrição --}}
                    <div class="form-control gap-2">
                        <label for="description" class="label-text font-medium">Descrição</label>
                        <textarea name="description" id="description" rows="5" required
                                  class="textarea textarea-bordered w-full @error('description') textarea-error @enderror"
                                  placeholder="Detalhes do evento, programação...">{{ old('description') }}</textarea>
                        @error('description')<span class="text-error text-xs">{{ $message }}</span>@enderror
                    </div>

                    {{-- Data e Hora --}}
                    <div class="form-control gap-2">
                        <label for="date_time" class="label-text font-medium">Data e hora</label>
                        <input type="datetime-local" name="date_time" id="date_time" value="{{ old('date_time') }}" required
                               class="input input-bordered w-full @error('date_time') input-error @enderror">
                        <span class="text-xs text-base-content/40">A data deve ser futura.</span>
                        @error('date_time')<span class="text-error text-xs">{{ $message }}</span>@enderror
                    </div>

                    {{-- Localização --}}
                    <div class="form-control gap-2">
                        <label for="location" class="label-text font-medium">Local</label>
                        <input type="text" name="location" id="location" value="{{ old('location') }}" required
                               class="input input-bordered w-full @error('location') input-error @enderror"
                               placeholder="Ex.: Auditório Central">
                        @error('location')<span class="text-error text-xs">{{ $message }}</span>@enderror
                    </div>

                    {{-- Capacidade --}}
                    <div class="form-control gap-2">
                        <label for="capacity" class="label-text font-medium">Vagas disponíveis</label>
                        <input type="number" name="capacity" id="capacity" value="{{ old('capacity', 10) }}" min="1" required
                               class="input input-bordered w-full @error('capacity') input-error @enderror">
                        @error('capacity')<span class="text-error text-xs">{{ $message }}</span>@enderror
                    </div>

                    {{-- Categoria --}}
                    <div class="form-control gap-2">
                        <label for="category_id" class="label-text font-medium">Categoria</label>
                        <select name="category_id" id="category_id" required
                                class="select select-bordered w-full @error('category_id') select-error @enderror">
                            <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>Selecione uma categoria</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')<span class="text-error text-xs">{{ $message }}</span>@enderror
                    </div>

                    {{-- Banner --}}
                    <div class="form-control gap-2">
                        <label for="banner" class="label-text font-medium">Banner do evento</label>
                        <input type="file" name="banner" id="banner"
                               class="file-input file-input-bordered w-full @error('banner') file-input-error @enderror"
                               accept="image/*">
                        <span class="text-xs text-base-content/40">Tamanho máximo: 2MB. Formatos: JPG, PNG, WEBP.</span>
                        @error('banner')<span class="text-error text-xs">{{ $message }}</span>@enderror
                    </div>

                    <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3 pt-4">
                        <a href="{{ route('events.index') }}" class="btn btn-ghost btn-sm">Cancelar</a>
                        <button type="submit" class="btn btn-primary btn-sm shadow-md">Criar evento</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>