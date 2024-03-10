<div class="w-10/12 mx-auto">
    <x-error-alert/>
    <div class="mx-auto flex flex-col lg:flex-row justify-between">
        <!-- Component: Rounded base basic select -->
        <div class="relative my-6 md:w-60">
            <select id="language" wire:model="language" required
                    class="relative w-full h-10 px-4 text-sm transition-all bg-white border rounded outline-none appearance-none focus-visible:outline-none peer border-slate-200 text-slate-500 autofill:bg-white focus:border-emerald-500 focus:focus-visible:outline-none disabled:cursor-not-allowed disabled:bg-slate-50 disabled:text-slate-400">
                <option value="" disabled selected></option>
                <option value="php">PHP</option>
                <option value="javascript">Javascript</option>
                <option value="python">Python</option>
                <option value="golang">Golang</option>
                <option value="rust">Rust</option>
                <option value="dart">Dart</option>
            </select>
            <label for="language"
                   class="pointer-events-none absolute top-2.5 left-2 z-[1] px-2 text-sm text-slate-400 transition-all before:absolute before:top-0 before:left-0 before:z-[-1] before:block before:h-full before:w-full before:bg-white before:transition-all peer-required:after:text-pink-500 peer-required:after:content-['\00a0*'] peer-valid:-top-2 peer-valid:text-xs peer-focus:-top-2 peer-focus:text-xs peer-focus:text-emerald-500 peer-disabled:cursor-not-allowed peer-disabled:text-slate-400 peer-disabled:before:bg-transparent">
                Selecione a linguagem
            </label>
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="pointer-events-none absolute top-2.5 right-2 h-5 w-5 fill-slate-400 transition-all peer-focus:fill-emerald-500 peer-disabled:cursor-not-allowed"
                 viewBox="0 0 20 20" fill="currentColor" aria-labelledby="title-04 description-04"
                 role="graphics-symbol">
                <title id="title-04">Arrow Icon</title>
                <desc id="description-04">Arrow icon of the select list.</desc>
                <path fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"/>
            </svg>
        </div>
        <!-- End Rounded base basic select -->
        <!-- Component: Rounded base basic select -->
        <div class="relative my-6 md:w-60">
            <select id="location" wire:model="location" required
                    class="relative w-full h-10 px-4 text-sm transition-all bg-white border rounded outline-none appearance-none focus-visible:outline-none peer border-slate-200 text-slate-500 autofill:bg-white focus:border-emerald-500 focus:focus-visible:outline-none disabled:cursor-not-allowed disabled:bg-slate-50 disabled:text-slate-400">
                <option value="" disabled selected></option>
                <option value="brasil">Brasil</option>
                <option value="canada">Canadá</option>
                <option value="china">China</option>
            </select>
            <label for="location"
                   class="pointer-events-none absolute top-2.5 left-2 z-[1] px-2 text-sm text-slate-400 transition-all before:absolute before:top-0 before:left-0 before:z-[-1] before:block before:h-full before:w-full before:bg-white before:transition-all peer-required:after:text-pink-500 peer-required:after:content-['\00a0*'] peer-valid:-top-2 peer-valid:text-xs peer-focus:-top-2 peer-focus:text-xs peer-focus:text-emerald-500 peer-disabled:cursor-not-allowed peer-disabled:text-slate-400 peer-disabled:before:bg-transparent">
                Selecione o País
            </label>
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="pointer-events-none absolute top-2.5 right-2 h-5 w-5 fill-slate-400 transition-all peer-focus:fill-emerald-500 peer-disabled:cursor-not-allowed"
                 viewBox="0 0 20 20" fill="currentColor" aria-labelledby="title-04 description-04"
                 role="graphics-symbol">
                <title id="title-04">Arrow Icon</title>
                <desc id="description-04">Arrow icon of the select list.</desc>
                <path fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"/>
            </svg>
        </div>
        <!-- End Rounded base basic select -->
        <!-- Component: Rounded base basic select -->
        <div class="relative my-6 md:w-60">
            <select id="repos" wire:model="repos" required
                    class="relative w-full h-10 px-4 text-sm transition-all bg-white border rounded outline-none appearance-none focus-visible:outline-none peer border-slate-200 text-slate-500 autofill:bg-white focus:border-emerald-500 focus:focus-visible:outline-none disabled:cursor-not-allowed disabled:bg-slate-50 disabled:text-slate-400">
                <option value="" disabled selected></option>
                <option value="10">10</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="200">200</option>
            </select>
            <label for="repos"
                   class="pointer-events-none absolute top-2.5 left-2 z-[1] px-2 text-sm text-slate-400 transition-all before:absolute before:top-0 before:left-0 before:z-[-1] before:block before:h-full before:w-full before:bg-white before:transition-all peer-required:after:text-pink-500 peer-required:after:content-['\00a0*'] peer-valid:-top-2 peer-valid:text-xs peer-focus:-top-2 peer-focus:text-xs peer-focus:text-emerald-500 peer-disabled:cursor-not-allowed peer-disabled:text-slate-400 peer-disabled:before:bg-transparent">
                Quantidade Repos Públicos
            </label>
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="pointer-events-none absolute top-2.5 right-2 h-5 w-5 fill-slate-400 transition-all peer-focus:fill-emerald-500 peer-disabled:cursor-not-allowed"
                 viewBox="0 0 20 20" fill="currentColor" aria-labelledby="title-04 description-04"
                 role="graphics-symbol">
                <title id="title-04">Arrow Icon</title>
                <desc id="description-04">Arrow icon of the select list.</desc>
                <path fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"/>
            </svg>
        </div>
        <!-- End Rounded base basic select -->
        <div class="w-2/12 flex space-x-2 items-center">
            <x-primary-button wire:click="search" class="w-24 h-10">Buscar</x-primary-button>
            <x-secondary-button wire:click="clear" class="w-24 h-10">Reset</x-secondary-button>
        </div>
    </div>
    <div class="z-50 text-white mb-4" wire:loading>
        <button type="button" class="bg-indigo-500 p-4 rounded-md" disabled>
            Processing...
        </button>
    </div>
    {{--table--}}
    <div>
        <div
            class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1"
        >
            <h4 class="mb-6 text-xl font-bold text-black">
                Candidatos Encontrados
            </h4>

            <div class="flex flex-col">
                <div
                    class="grid grid-cols-3 rounded-sm bg-gray-2 dark:bg-meta-4 sm:grid-cols-5"
                >
                    <div class="p-2.5 xl:p-5">
                        <h5 class="text-sm font-medium uppercase xsm:text-base">Favoritar</h5>
                    </div>
                    <div class="p-2.5 xl:p-5">
                        <h5 class="text-sm font-medium uppercase xsm:text-base">Avatar</h5>
                    </div>
                    <div class="p-2.5 text-center xl:p-5">
                        <h5 class="text-sm font-medium uppercase xsm:text-base">Nome</h5>
                    </div>
                    <div class="p-2.5 text-center xl:p-5">
                        <h5 class="text-sm font-medium uppercase xsm:text-base">Email</h5>
                    </div>
                    <div class="hidden p-2.5 text-center sm:block xl:p-5">
                        <h5 class="text-sm font-medium uppercase xsm:text-base">Localização</h5>
                    </div>
                </div>
                @if(isset($results))
                    @foreach($results as $result)

                        <div
                            class="grid grid-cols-3 border-b border-stroke dark:border-strokedark sm:grid-cols-5"
                        >
                            <div class="flex items-center gap-3 p-2.5 xl:p-5">
                                <!-- Component: Primary basic checkbox -->
                                <div class="relative flex flex-wrap items-center ">
                                    <input
                                        class="w-8 h-8 transition-colors bg-white border-2 rounded appearance-none cursor-pointer focus-visible:outline-none peer border-slate-500 checked:border-emerald-500 checked:bg-emerald-500 checked:hover:border-emerald-600 checked:hover:bg-emerald-600 focus:outline-none checked:focus:border-emerald-700 checked:focus:bg-emerald-700 disabled:cursor-not-allowed disabled:border-slate-100 disabled:bg-slate-50"
                                        type="checkbox" id="favorite"
                                        wire:change="save('{{json_encode($result['node'])}}')"/>
                                    <label
                                        class="pl-2 cursor-pointer text-slate-500 peer-disabled:cursor-not-allowed peer-disabled:text-slate-400"
                                        for="favorite">
                                    </label>
                                    <svg
                                        class="absolute left-0 w-4 h-4 transition-all duration-300 -rotate-90 opacity-0 pointer-events-none top-1 fill-white stroke-white peer-checked:rotate-0 peer-checked:opacity-100 peer-disabled:cursor-not-allowed"
                                        viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true" aria-labelledby="title-1 description-1"
                                        role="graphics-symbol">
                                        <title id="title-1">Check mark icon</title>
                                        <desc id="description-1">
                                            Check mark icon to indicate whether the radio input is checked
                                            or not.
                                        </desc>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M12.8116 5.17568C12.9322 5.2882 13 5.44079 13 5.5999C13 5.759 12.9322 5.91159 12.8116 6.02412L7.66416 10.8243C7.5435 10.9368 7.37987 11 7.20925 11C7.03864 11 6.87501 10.9368 6.75435 10.8243L4.18062 8.42422C4.06341 8.31105 3.99856 8.15948 4.00002 8.00216C4.00149 7.84483 4.06916 7.69434 4.18846 7.58309C4.30775 7.47184 4.46913 7.40874 4.63784 7.40737C4.80655 7.406 4.96908 7.46648 5.09043 7.57578L7.20925 9.55167L11.9018 5.17568C12.0225 5.06319 12.1861 5 12.3567 5C12.5273 5 12.691 5.06319 12.8116 5.17568Z"/>
                                    </svg>
                                </div>
                                <!-- End Primary basic checkbox -->
                            </div>
                            <div class="flex items-center gap-3 p-2.5 xl:p-5">

                            <img src="{{$result['node']['avatarUrl']}}" alt="Brand"
                                 class="rounded-full w-12 h-12"/>

                            </div>

                            <div class="flex items-center justify-center p-2.5 xl:p-5">
                                <p class="font-medium text-black">  {{$result['node']['name']}}</p>
                            </div>

                            <div class="flex items-center justify-center p-2.5 xl:p-5">
                                <a href="mailto:{{$result['node']['email']}}"
                                   class="cursor-pointer font-medium text-meta-3">{{$result['node']['email']}}</a>
                            </div>

                            <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                                <p class="font-medium text-black">{{$result['node']['location']}}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <!-- Botões de paginação -->

            <div class="w-full mt-12 flex justify-end">
                @if($cursor)
                    {{--<button class="float-right" wire:click="previousPage"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                    </button>--}}
                    <button wire:click="search('{{ $cursor['endCursor'] }}')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6 text-indigo-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                        </svg>
                    </button>
                @endif
            </div>
        </div>
    </div>

</div>
