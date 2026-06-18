<x-app-layout>
    <div class="min-h-[calc(100vh-8rem)] flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-md">
            <!-- Logo e cabeçalho -->
            <div class="text-center mb-8">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-primary to-secondary flex items-center justify-center mx-auto mb-4 shadow-lg shadow-primary/20">
                    <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/></svg>
                </div>
                <h1 class="text-2xl font-bold text-base-content">Bem-vindo de volta</h1>
                <p class="text-base-content/60 text-sm mt-2">Entre na sua conta para continuar</p>
            </div>

            <!-- Card -->
            <div class="card bg-base-100/80 backdrop-blur-sm shadow-2xl border border-base-200">
                <div class="card-body gap-5 p-8">
                    @if(session('error'))
                        <div class="alert alert-error text-sm">
                            <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                            {{ session('error') }}
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success text-sm">
                            <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-5">
                        @csrf
                        <div class="form-control gap-2">
                            <label class="label"><span class="label-text font-medium">E-mail</span></label>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="seuemail@exemplo.com" class="input input-bordered w-full @error('email') input-error @enderror" required>
                            @error('email') <span class="text-error text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-control gap-2">
                            <label class="label"><span class="label-text font-medium">Senha</span></label>
                            <input type="password" name="password" placeholder="Sua senha" class="input input-bordered w-full @error('password') input-error @enderror" required>
                            @error('password') <span class="text-error text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-full mt-2 shadow-lg shadow-primary/20">Entrar</button>
                    </form>

                    <p class="text-center text-sm text-base-content/60">
                        Não tem conta?
                        <a href="{{ route('register') }}" class="text-primary font-semibold hover:underline">Criar conta grátis</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>