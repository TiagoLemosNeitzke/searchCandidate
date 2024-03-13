<div class="flex flex-wrap items-center p-4 bg-gray-700 rounded-l-lg rounded-r-lg">
    <nav aria-label="breadcrumb">
        <ol class="flex leading-none text-blue-500 divide-x">

            <li class="inline-flex items-center px-4 text-gray-400" aria-current="page">
                <x-nav-link :href="route('search')" :active="request()->routeIs('search')" wire:navigate>
                    {{ __('Buscar') }}
                </x-nav-link>
            </li>
            <li class="inline-flex items-center px-4 text-gray-400" aria-current="page">
                <x-nav-link :href="route('favorite')" :active="request()->routeIs('favorite')" wire:navigate>
                    {{ __('Listar') }}
                </x-nav-link>
            </li>
        </ol>
    </nav>
</div>
