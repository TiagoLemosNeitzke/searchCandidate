<x-slot name="header">
    <div class="flex items-center justify-between">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Buscar Candidato') }}
        </h2>

        <x-bread-crumb />
    </div>
</x-slot>
<div class="mx-auto max-w-7xl">
    <div class="fixed z-50 text-white transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" wire:loading>
        <button type="button" class="p-4 bg-indigo-500 rounded-md" disabled>
            Processing...
        </button>
    </div>

    <x-error-alert />

    <div class="flex flex-col items-center justify-between lg:flex-row">
        <x-select-component :options="['PHP', 'javascript', 'Python', 'Golang', 'Rust', 'Dart']" label="Selecione a linguagem" model="language" />


        <div class="relative my-6 md:w-60">
            <x-input-label value="Digite o País" />
            <x-text-input class="bg-white" wire:model="location" />
        </div>

        <x-select-component :options="['10', '100', '200', '500', '1000']" label="Quantidade de Repos" model="repos" />

        <div class="flex items-center justify-center space-x-2">
            <x-primary-button wire:click="search" wire:loading.attr="disabled" class="w-24 h-10">
                Buscar
            </x-primary-button>
            <x-secondary-button wire:click="clear" class="w-24 h-10">
                Reset
            </x-secondary-button>
        </div>
    </div>

    {{-- table --}}
    <x-table title="Candidatos Encontrados" :items="$results" :columns="[
        ['label' => 'Avatar', 'column' => 'node.avatarUrl'],
        ['label' => 'NOME', 'column' => 'node.name'],
        ['label' => 'EMAIL', 'column' => 'node.email'],
        ['label' => 'Filtros', 'column' => 'filters'],
        ['label' => 'BIO', 'column' => 'node.bio'],
        ['label' => 'Contribuições', 'column' => 'node.contributed_count'],
        ['label' => 'Localização', 'column' => 'node.location'],
    ]" />


</div>
