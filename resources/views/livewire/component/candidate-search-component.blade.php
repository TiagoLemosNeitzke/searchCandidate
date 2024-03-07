<div class="w-10/12 mx-auto">

    <div class="mx-auto flex flex-col lg:flex-row justify-between">
        <!-- Component: Rounded base basic select -->
        <div class="relative my-6 md:w-60">
            <select id="language" wire:model="language" required
                    class="relative w-full h-10 px-4 text-sm transition-all bg-white border rounded outline-none appearance-none focus-visible:outline-none peer border-slate-200 text-slate-500 autofill:bg-white focus:border-emerald-500 focus:focus-visible:outline-none disabled:cursor-not-allowed disabled:bg-slate-50 disabled:text-slate-400">
                <option value="" disabled selected></option>
                <option value="php">PHP</option>
                <option value="javascript">Javascript</option>
                <option value="python">Python</option>
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
                <option value="cuba">Cuba</option>
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
            </select>
            <label for="repos"
                   class="pointer-events-none absolute top-2.5 left-2 z-[1] px-2 text-sm text-slate-400 transition-all before:absolute before:top-0 before:left-0 before:z-[-1] before:block before:h-full before:w-full before:bg-white before:transition-all peer-required:after:text-pink-500 peer-required:after:content-['\00a0*'] peer-valid:-top-2 peer-valid:text-xs peer-focus:-top-2 peer-focus:text-xs peer-focus:text-emerald-500 peer-disabled:cursor-not-allowed peer-disabled:text-slate-400 peer-disabled:before:bg-transparent">
                Quantidade Repos Publicos
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
        <div class="w-2/12 flex justify-center items-center">
            |
            <x-primary-button wire:click="search" class="w-24 h-10">Buscar</x-primary-button>
        </div>
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
                        {{--@dump($result['node'])--}}
                        <div
                            class="grid grid-cols-3 border-b border-stroke dark:border-strokedark sm:grid-cols-5"
                        >
                            <div class="flex items-center gap-3 p-2.5 xl:p-5">
                                <div class="flex-shrink-0">
                                    <img src="{{$result['node']['avatarUrl']}}" alt="Brand"
                                         class="rounded-full w-8 h-8"/>
                                </div>
                            </div>

                            <div class="flex items-center justify-center p-2.5 xl:p-5">
                                <p class="font-medium text-black">  {{$result['node']['name']}}</p>
                            </div>

                            <div class="flex items-center justify-center p-2.5 xl:p-5">
                                <p class="font-medium text-meta-3">{{$result['node']['email']}}</p>
                            </div>

                            <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
                                <p class="font-medium text-black">{{$result['node']['location']}}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
