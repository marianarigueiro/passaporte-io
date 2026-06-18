<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-base-content">Meu Perfil</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
        {{-- Informações do Perfil --}}
        <div class="card bg-base-100 shadow-sm border border-base-200">
            <div class="card-body p-6 sm:p-8">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        {{-- Alterar Senha --}}
        <div class="card bg-base-100 shadow-sm border border-base-200">
            <div class="card-body p-6 sm:p-8">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        {{-- Excluir Conta --}}
        <div class="card bg-base-100 shadow-sm border border-base-200 border-error/20">
            <div class="card-body p-6 sm:p-8">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>