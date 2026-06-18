<x-guest-layout>
    <div class="w-full max-w-md">
        <div class="text-center mb-10">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-primary to-secondary flex items-center justify-center mx-auto mb-5 shadow-lg shadow-primary/20">
                <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/></svg>
            </div>
            <h1 class="text-2xl font-bold text-base-content">Criar sua conta</h1>
            <p class="text-base-content/60 text-sm mt-2">Junte-se à plataforma de eventos</p>
        </div>

        <div class="card-auth card bg-base-200/60 shadow-2xl border border-base-100/10">
            <div class="card-body gap-5 p-8">
                @if($errors->any())
                    <div class="alert alert-error text-sm"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>Corrija os erros abaixo.</div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-5">
                    @csrf
                    <div class="form-control gap-2">
                        <label class="label"><span class="label-text font-medium">Nome completo</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Seu nome" class="input input-bordered w-full @error('name') input-error @enderror" required>
                        @error('name')<span class="text-error text-xs mt-1">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-control gap-2">
                        <label class="label"><span class="label-text font-medium">E-mail</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="seuemail@exemplo.com" class="input input-bordered w-full @error('email') input-error @enderror" required>
                        @error('email')<span class="text-error text-xs mt-1">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-control gap-2">
                        <label class="label"><span class="label-text font-medium">Senha</span></label>
                        <input type="password" name="password" placeholder="Mínimo 8 caracteres" class="input input-bordered w-full @error('password') input-error @enderror" required>
                        @error('password')<span class="text-error text-xs mt-1">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-control gap-2">
                        <label class="label"><span class="label-text font-medium">Confirmar senha</span></label>
                        <input type="password" name="password_confirmation" placeholder="Repita a senha" class="input input-bordered w-full" required>
                    </div>

                    <div class="form-control gap-3">
                        <label class="label"><span class="label-text font-medium">Tipo de conta</span></label>
                        <label class="flex items-start gap-3 p-4 rounded-xl border-2 cursor-pointer transition-all {{ old('role') === 'participant' ? 'border-primary bg-primary/5' : 'border-base-300 hover:border-primary/40' }}">
                            <input type="radio" name="role" value="participant" class="radio radio-primary mt-0.5" {{ old('role') === 'participant' ? 'checked' : '' }}>
                            <div>
                                <p class="font-medium">Participante</p>
                                <p class="text-xs text-base-content/50">Quero descobrir e participar de eventos</p>
                            </div>
                        </label>
                        <label class="flex items-start gap-3 p-4 rounded-xl border-2 cursor-pointer transition-all {{ old('role') === 'organizer' ? 'border-primary bg-primary/5' : 'border-base-300 hover:border-primary/40' }}">
                            <input type="radio" name="role" value="organizer" class="radio radio-primary mt-0.5" {{ old('role') === 'organizer' ? 'checked' : '' }}>
                            <div>
                                <p class="font-medium">Organizador</p>
                                <p class="text-xs text-base-content/50">Quero criar e gerenciar meus eventos</p>
                            </div>
                        </label>
                        @error('role')<span class="text-error text-xs mt-1">{{ $message }}</span>@enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-full mt-2 shadow-lg shadow-primary/20">Criar conta</button>
                </form>

                <p class="text-center text-sm text-base-content/60">
                    Já tem conta?
                    <a href="{{ route('login') }}" class="text-primary font-semibold hover:underline">Entrar</a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>