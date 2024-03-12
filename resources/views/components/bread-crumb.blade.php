<div class="flex flex-wrap items-center p-4 bg-gray-700 rounded-l-lg rounded-r-lg">
    <nav aria-label="breadcrumb">
        <ol class="flex leading-none text-blue-500 divide-x">

            <li class="inline-flex items-center px-4 text-gray-400" aria-current="page">
                <x-nav-link :href="route('candidate.search')" :active="request()->routeIs('candidate.search')" wire:navigate>
                    {{ __('Buscar') }}
                </x-nav-link>
            </li>
            <li class="inline-flex items-center px-4 text-gray-400" aria-current="page">
                <x-nav-link :href="route('candidate.favorite')" :active="request()->routeIs('candidate.favorite')" wire:navigate>
                    {{ __('Listar') }}
                </x-nav-link>
            </li>
        </ol>
    </nav>
</div>
