<div
    class="max-w-7xl rounded-md dark:text-gray-400 bg-white dark:bg-gray-800 px-5 pb-2.5 pt-6 shadow-default dark:bg-boxdark sm:px-7.5 xl:pb-1">
    <h4 class="mb-6 text-xl font-bold">
        {{ $title }}
    </h4>

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
                        @if ($column['column'] === 'node.avatarUrl' || $column['column'] === 'avatarUrl')
                            <div class="relative w-[80px] h-[80px]">

                                <div
                                    class="absolute flex items-start justify-between w-full h-full opacity-0 hover:opacity-100">

                                    <button wire:click='candidateRemove({{ $item->id ?? null }})'
                                        wire:confirm='Tem certeza de que deseja apagar? o registro não pode ser restaurado.'>

                                        @if (request()->routeIs('candidate.favorite'))
                                            <svg class='w-6 h-6' xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        @endif



                                    </button>

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
