<x-guest-layout>
<div class="min-h-screen flex items-center justify-center px-4 py-10">

    <div class="w-full max-w-md">

        {{-- Logo --}}
        <div class="text-center mb-8">
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center mx-auto mb-4" style="background: rgba(255,255,255,0.2);">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                </svg>
            </div>
            <h1 class="text-2xl font-semibold text-white">Criar sua conta</h1>
            <p class="text-white/70 text-sm mt-1">Junte-se à plataforma de eventos</p>
        </div>

        {{-- Card --}}
        <div class="card bg-base-100 shadow-2xl">
            <div class="card-body gap-4">

                @if($errors->any())
                    <div class="alert alert-error text-sm">
                        <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        <span>Corrija os erros abaixo para continuar.</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-4">
                    @csrf

                    {{-- Nome --}}
                    <div class="form-control gap-1">
                        <label class="label py-0">
                            <span class="label-text text-sm font-medium">Nome completo</span>
                        </label>
                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Seu nome"
                            class="input input-bordered w-full @error('name') input-error @enderror"
                            required
                        >
                        @error('name')
                            <span class="text-error text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- E-mail --}}
                    <div class="form-control gap-1">
                        <label class="label py-0">
                            <span class="label-text text-sm font-medium">E-mail</span>
                        </label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="seuemail@exemplo.com"
                            class="input input-bordered w-full @error('email') input-error @enderror"
                            required
                        >
                        @error('email')
                            <span class="text-error text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Senha --}}
                    <div class="form-control gap-1">
                        <label class="label py-0">
                            <span class="label-text text-sm font-medium">Senha</span>
                        </label>
                        <input
                            type="password"
                            name="password"
                            placeholder="Mínimo 8 caracteres"
                            class="input input-bordered w-full @error('password') input-error @enderror"
                            required
                        >
                        @error('password')
                            <span class="text-error text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Confirmar senha --}}
                    <div class="form-control gap-1">
                        <label class="label py-0">
                            <span class="label-text text-sm font-medium">Confirmar senha</span>
                        </label>
                        <input
                            type="password"
                            name="password_confirmation"
                            placeholder="Repita a senha"
                            class="input input-bordered w-full"
                            required
                        >
                    </div>

                    {{-- Perfil de acesso (RF01) --}}
                    <div class="form-control gap-2">
                        <label class="label py-0">
                            <span class="label-text text-sm font-medium">Tipo de conta</span>
                        </label>

                        <label class="flex items-start gap-3 p-3 rounded-xl border-2 cursor-pointer transition-colors
                            {{ old('role') === 'participant' ? 'border-primary bg-primary/5' : 'border-base-300 hover:border-primary/40' }}">
                            <input type="radio" name="role" value="participant" class="radio radio-primary mt-0.5"
                                {{ old('role') === 'participant' ? 'checked' : '' }}>
                            <div>
                                <p class="text-sm font-medium">Participante</p>
                                <p class="text-xs text-base-content/50">Quero descobrir e me inscrever em eventos</p>
                            </div>
                        </label>

                        <label class="flex items-start gap-3 p-3 rounded-xl border-2 cursor-pointer transition-colors
                            {{ old('role') === 'organizer' ? 'border-primary bg-primary/5' : 'border-base-300 hover:border-primary/40' }}">
                            <input type="radio" name="role" value="organizer" class="radio radio-primary mt-0.5"
                                {{ old('role') === 'organizer' ? 'checked' : '' }}>
                            <div>
                                <p class="text-sm font-medium">Organizador</p>
                                <p class="text-xs text-base-content/50">Quero criar e gerenciar meus próprios eventos</p>
                            </div>
                        </label>

                        @error('role')
                            <span class="text-error text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-full mt-2">
                        Criar conta
                    </button>

                </form>

                <p class="text-center text-sm text-base-content/60">
                    Já tem conta?
                    <a href="{{ route('login') }}" class="text-primary font-medium hover:underline">
                        Entrar
                    </a>
                </p>

            </div>
        </div>

    </div>
</div>
</x-guest-layout>