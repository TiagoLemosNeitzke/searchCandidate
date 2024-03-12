<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>
                        @if (session()->has('success'))
                            <div class="relative flex flex-col sm:flex-row sm:items-center bg-gray-200 dark:bg-green-700 shadow rounded-md py-5 pl-6 pr-8 sm:pr-6 mb-3 mt-3">
                                <div class="flex flex-row items-center border-b sm:border-b-0 w-full sm:w-auto pb-4 sm:pb-0">
                                    <div class="text-green-500" dark:text-gray-500>
                                        <svg class="w-6 sm:w-5 h-6 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    {{--                                    <div class="text-sm font-medium ml-3">Success!.</div>--}}
                                </div>
                                <div class="text-sm tracking-wide text-gray-500 dark:text-white mt-4 sm:mt-0 sm:ml-4"> {{ session('success') }}</div>
                                <div class="absolute sm:relative sm:top-auto sm:right-auto ml-auto right-4 top-4 text-gray-400 hover:text-gray-800 cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                </div>
                            </div>
                        @endif
                        <div class="m-4 ">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click="create">{{__('Adicionar Usuario')}}</button>
                        </div>
                        @if($isOpen)
                            <div class="fixed inset-0 flex items-center justify-center z-50">
                                <div class="absolute inset-0 bg-black opacity-50"></div>
                                <div class="relative bg-gray-200 p-8 rounded shadow-lg w-1/2 dark:bg-gray-800 dark:border-gray-700">
                                    <!-- Modal content goes here -->
                                    <svg wire:click.prevent="$set('isOpen', false)"
                                         class="ml-auto w-6 h-6 text-gray-900 dark:text-gray-900 cursor-pointer fill-current dark:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                                    </svg>
                                    <div>
                                        {{--                                        <h2 class="text-lg font-semibold mb-4">Edit User</h2>--}}
                                        <h2 class="text-2xl font-bold mb-4">{{ $userId ? 'Editar Usuario' : 'Criar Usuario' }}</h2>
                                        <div class="mt-5 p-4 relative z-10 bg-white border rounded-xl sm:mt-10 md:p-10 dark:bg-gray-800 dark:border-gray-700">
                                            <form wire:submit.prevent="{{ $userId ? 'update' : 'store' }}">
                                                <div class="mb-4">
                                                    <label for="name" class="block text-sm font-medium mb-2 dark:text-white">Name</label>
                                                    <input wire:model="name"
                                                           type="text"
                                                           id="name"
                                                           name="name"
                                                           class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500
                                                                focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900
                                                                dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="Fulano da Silva">
                                                </div>

                                                <div class="mb-4">
                                                    <label for="email" class="block text-sm font-medium mb-2 dark:text-white">Email</label>
                                                    <input wire:model="email"
                                                           type="email"
                                                           id="email"
                                                           name="email"
                                                           class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500
                                                                focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900
                                                                dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="seu@dominio.com">
                                                </div>
                                                {{--                                                @can(['searcher-nominator','admin'])--}}
                                                <!-- Checkbox para permissões -->
                                                <div class="mb-4">
                                                    <label class="block text-sm font-medium mb-2 dark:text-white">Permissões</label>
                                                    <div class="flex gap-x-6">
                                                        @foreach($availablePermissions as $permission)
                                                            {{--                                                            <div class="flex items-center">--}}
                                                            <div class="flex">
                                                                <input wire:model="selectedPermissions"
                                                                       type="checkbox"
                                                                       id="{{ $permission }}"
                                                                       name="permissions[]"
                                                                       value="{{ $permission->permission }}"
                                                                       class="shrink-0 mt-0.5 border-gray-200
                                                                                rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                                                                                dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500
                                                                                dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                                <label for="hs-checkbox-group-1"
                                                                       class="text-sm text-gray-500 ms-3 dark:text-gray-400">{{ $permission->permission }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="flex justify-end">
                                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mr-2">{{ $userId ? 'Atualizar' : 'Criar' }}</button>
                                                        <button type="button" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded" wire:click="closeModal">Cancel</button>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </section>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3">

                        <!-- Table -->
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-slate-800">
                            <tr>
                                <th scope="col" class="px-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start">
                                    <div class="flex items-center gap-x-3">
                                    <span class="ml-3 text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                      @lang('Nome')
                                    </span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                      @lang('Status')
                                    </span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                      @lang('Permissões')
                                    </span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                      @lang('Data de Criação')
                                    </span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-end"></th>
                            </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($users as $user)
                                <tr>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="ml-3 ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                                            <div class="flex items-center gap-x-3">
                                                {{--                                            <img class="inline-block size-[38px] rounded-full" src="https://images.unsplash.com/photo-1531927557220-a9e23c1e4794?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80" alt="Image Description">--}}
                                                <div class="grow">
                                                    <span class="block text-sm font-semibold text-gray-800 dark:text-gray-200">{{$user->name}}</span>
                                                    <span class="block text-sm text-gray-500">{{$user->email}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        @if(!$user->hasAnyPermission())
                                            <div class="px-6 py-3">
                                                <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-white/10 dark:text-white">Sem permissões</span>
                                            </div>
                                        @else
                                            <div class="px-6 py-3">
                                                <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-teal-100 text-teal-800 dark:bg-teal-800/30 dark:text-teal-500">Ativo</span>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="h-px w-72 whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            @foreach($user->getAllPermissions() as $item)
                                                <span class="block text-sm font-semibold text-gray-800 dark:text-gray-200">[{{$item->permission}}]</span>

                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="text-sm text-gray-500">{{$user->created_at->format('d-m-Y')}}</span>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-1.5">
                                            <x-secondary-button wire:click="edit({{ $user->id }})">
                                                Edit
                                            </x-secondary-button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
