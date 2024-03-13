<div
    class="max-w-7xl rounded-md dark:text-gray-400 bg-white dark:bg-gray-800 px-5 pb-2.5 pt-6 shadow-default dark:bg-boxdark sm:px-7.5 xl:pb-1">
    <h4 class="mb-6 text-xl font-bold">
        {{ $title }}
    </h4>
    @if (session()->has('success'))
        <div
            class="relative flex flex-col sm:flex-row sm:items-center bg-gray-200 dark:bg-green-700 shadow rounded-md py-5 pl-6 pr-8 sm:pr-6 mb-3 mt-3">
            <div class="flex flex-row items-center border-b sm:border-b-0 w-full sm:w-auto pb-4 sm:pb-0">
                <div class="text-green-500" dark:text-gray-500>
                    <svg class="w-6 sm:w-5 h-6 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            <div
                class="text-sm tracking-wide text-gray-500 dark:text-white mt-4 sm:mt-0 sm:ml-4"> {{ session('success') }}</div>
            <div
                class="absolute sm:relative sm:top-auto sm:right-auto ml-auto right-4 top-4 text-gray-400 hover:text-gray-800 cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </div>
        </div>
    @endif
    <div class="flex flex-col w-full">

        {{-- column title --}}
        <div class="grid grid-cols-7 rounded-md bg-gray-2 dark:bg-meta-4 sm:grid-cols-7 bg-slate-900">

            @foreach ($columns as $column)
                <div class="p-2.5 text-center xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">
                        {{ $column['label'] }}
                    </h5>
                </div>
            @endforeach

        </div>

        @forelse($items as $item)
            <div class="grid grid-cols-7 border-b-2 border-slate-900 last:border-b-0 border-stroke hover:bg-slate-700/50"
                wire:key="{{ $item->id ?? null }}">

                @foreach ($columns as $column)
                    <div class="flex justify-center items-center gap-3 py-2.5 xl:py-5">
                        @if (($column['label'] == 'Favoritar' ))
                            <div class="flex items-center first:flex-col justify-center p-2.5 xl:p-5">
                                <input type="checkbox" wire:click="save({{json_encode($item['node'])}})">
                            </div>
                        @endif

                        @if ($column['column'] === 'node.avatarUrl' || $column['column'] === 'avatarUrl')
                            <div class="relative w-[80px] h-[80px]">
                                <div
                                    class="absolute flex items-start justify-between w-full h-full opacity-0 hover:opacity-100">

                                    @if (request()->routeIs('favorite'))
                                        <button wire:click='candidateRemove({{ $item->id ?? null }})'
                                                wire:confirm='Tem certeza de que deseja apagar? o registro não pode ser restaurado.'>
                                            <svg class='w-6 h-6' xmlns="http://www.w3.org/2000/svg" fill="none"
                                                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        </button>
                                        @endif

                                </div>

                                <img class="object-contain w-[80px] h-[80px] p-2 rounded-full"
                                    src="{{ data_get($item, $column['column']) }}" alt="Avatar" />

                            </div>
                        @endif

                        @if (
                            ($column['label'] !== 'Avatar' && $column['column'] !== 'node.avatarUrl') ||
                                ($column['label'] !== 'Avatar' && $column['column'] !== 'avatarUrl'))
                            <div class="flex items-center first:flex-col justify-center p-2.5 xl:p-5">
                                <div>

                                    <span x-data="{ tooltip: false, mouseX: 0, mouseY: 0 }"
                                        x-on:mouseover="tooltip = true; mouseX = $event.clientX; mouseY = $event.clientY"
                                        x-on:mouseleave="tooltip = false" class="relative" x-cloak>
                                        {{ Str::limit(data_get($item, $column['column']), 20) }}

                                        <div x-show="tooltip"
                                            class="absolute z-10 px-2 py-4 mt-2 bg-white rounded-lg shadow">
                                            <div class="text-sm">
                                                {{ data_get($item, $column['column']) }}
                                            </div>
                                            <div class="absolute w-6 h-6 transform rotate-45 bg-white -top-2 left-2">
                                            </div>
                                        </div>
                                    </span>


                                </div>
                            </div>
                        @endif

                    </div>
                @endforeach
            </div>

        @empty

            <div class="px-2 py-2">
                <p>Sem dados cadastrados</p>
            </div>

        @endforelse

        @if ($items instanceof \Illuminate\Pagination\LengthAwarePaginator)
            <div class="py-4" id="tfoot" wire:ignore>
                {{ $items->links() }}
            </div>
        @endif

    </div>
</div>
