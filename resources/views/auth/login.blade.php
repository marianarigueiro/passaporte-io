<x-guest-layout>
<div class="min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-md">

        {{-- Logo --}}
        <div class="text-center mb-8">
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center mx-auto mb-4" style="background: rgba(255,255,255,0.2);">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                </svg>
            </div>
            <h1 class="text-2xl font-semibold text-white">Bem-vindo de volta</h1>
            <p class="text-white/70 text-sm mt-1">Entre na sua conta para continuar</p>
        </div>

        {{-- Card --}}
        <div class="card bg-base-100 shadow-2xl">
            <div class="card-body gap-4">

                {{-- Flash de erro --}}
                @if(session('error'))
                    <div class="alert alert-error text-sm">
                        <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        {{ session('error') }}
                    </div>
                @endif

                {{-- Flash de sucesso (vindo do cadastro) --}}
                @if(session('success'))
                    <div class="alert alert-success text-sm">
                        <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-4">
                    @csrf

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
                            placeholder="Sua senha"
                            class="input input-bordered w-full @error('password') input-error @enderror"
                            required
                        >
                        @error('password')
                            <span class="text-error text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-full mt-2">
                        Entrar
                    </button>

                </form>

                <p class="text-center text-sm text-base-content/60">
                    Não tem conta?
                    <a href="{{ route('register') }}" class="text-primary font-medium hover:underline">
                        Criar conta grátis
                    </a>
                </p>

            </div>
        </div>

    </div>
</div>
</x-guest-layout>