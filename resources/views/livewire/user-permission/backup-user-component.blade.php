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
                                    <div class="text-sm font-medium ml-3">Success!.</div>
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
                                                                dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="Maria da Silva">
                                                </div>

                                                <div class="mb-4">
                                                    <label for="email" class="block text-sm font-medium mb-2 dark:text-white">Email</label>
                                                    <input wire:model="email"
                                                           type="email"
                                                           id="email"
                                                           name="email"
                                                           class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500
                                                                focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900
                                                                dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="you@site.com">
                                                </div>

{{--                                                <div class="mb-4">--}}
{{--                                                    <label for="blocked_at" class="block text-sm font-medium mb-2 dark:text-white">Data de Bloqueio</label>--}}
{{--                                                    <input wire:model="blocked_at"--}}
{{--                                                           type="date"--}}
{{--                                                           id="blocked_at"--}}
{{--                                                           name="blocked_at"--}}
{{--                                                           class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500--}}
{{--                                                                focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900--}}
{{--                                                                dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="dd-mm-yyyy">--}}
{{--                                                </div>--}}
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

{{--                                <th scope="col" class="px-6 py-3 text-start">--}}
{{--                                    <div class="flex items-center gap-x-2">--}}
{{--                                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">--}}
{{--                                      @lang('Data de Bloqueio')--}}
{{--                                    </span>--}}
{{--                                    </div>--}}
{{--                                </th>--}}
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
                                        @if(!empty($user->blocked_at))
                                            <div class="px-6 py-3">
                                                <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-800/30 dark:text-red-500">Bloqueado</span>
                                                {{--                                            <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-red-500 text-white">Bloqueado</span>--}}
                                            </div>
                                        @elseif(!$user->hasAnyPermission())
                                            <div class="px-6 py-3">
                                                <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-white/10 dark:text-white">Sem permissões</span>
                                                {{--                                            <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-yellow-500 text-white">Sem permissões</span>--}}
                                            </div>
                                        @else
                                            <div class="px-6 py-3">
                                                <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-teal-100 text-teal-800 dark:bg-teal-800/30 dark:text-teal-500">Ativo</span>
                                                {{--                                            <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-teal-500 text-white">Ativo</span>--}}
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
{{--                                    <td class="size-px whitespace-nowrap">--}}
{{--                                        <div class="px-6 py-3">--}}
{{--                                            <span class="text-sm text-gray-500">{{empty($user->blocked_at)?"":Carbon\Carbon::parse($user->blocked_at)->format('d-m-Y')}}</span>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="text-sm text-gray-500">{{$user->created_at->format('d-m-Y')}}</span>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-1.5">
                                            {{--                                        <button wire:click="openEditModal({{ $user->id }})" class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">--}}
                                            {{--                                            Edit--}}
                                            {{--                                        </button>--}}
                                            {{--                                        <button wire:click="openEditModal({{ $user->id }})" wire:click="$refresh" class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">--}}
                                            {{--                                            Edit--}}
                                            {{--                                        </button>--}}
                                            {{--                                                    <button wire:click="openEditModal({{ $user->id }})">Editar</button>--}}
                                            {{--<button wire:click="$dispatch('openEditModal', {component: 'user-permission.edit-user', arguments: {userId: {{ $user->id }}}})">Edit User</button>--}}
{{--                                            <x-secondary-button wire:click="$dispatch('openEditModal', { component: 'user-permission.edit-user', arguments: { userId: {{ $user->id }} }})">--}}
                                            <x-secondary-button wire:click="edit({{ $user->id }})">
                                                Edit
                                            </x-secondary-button>
{{--                                            <button class="" wire:click="edit({{ $user->id }})">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 mt-0 w-4 h-4">--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />--}}
{{--                                                </svg>--}}
{{--                                            </button>--}}
                                            {{--                                                            <livewire:edit-user :userId="$user->id" />--}}
                                            {{--                                        <livewire:edit-user-button :userId="$user->id" />--}}
                                            {{--                                        <a class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">--}}
                                            {{--                                            Edit--}}
                                            {{--                                        </a>--}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                        <!-- End Footer -->
                        {{--                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">--}}
                        {{--                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">--}}
                        {{--                            <tr>--}}
                        {{--                                <th scope="col" class="px-6 py-3">--}}
                        {{--                                    Nome--}}
                        {{--                                </th>--}}
                        {{--                                <th scope="col" class="px-6 py-3">--}}
                        {{--                                    E-Mail--}}
                        {{--                                </th>--}}
                        {{--                                <th scope="col" class="px-6 py-3">--}}
                        {{--                                    Action--}}
                        {{--                                </th>--}}
                        {{--                            </tr>--}}
                        {{--                            </thead>--}}
                        {{--                            @forelse ($users as $user)--}}
                        {{--                                <tbody wire:key="{{ $user->id }}">--}}
                        {{--                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">--}}
                        {{--                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">--}}
                        {{--                                        {{$user->name}}--}}
                        {{--                                    </th>--}}
                        {{--                                    <td class="px-6 py-4">--}}
                        {{--                                        {{$user->email}}--}}
                        {{--                                    </td>--}}
                        {{--                                    <td class="px-6 py-4">--}}
                        {{--                                        <button class="" wire:click="edit({{ $user->id }})">--}}
                        {{--                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 mt-0 w-4 h-4">--}}
                        {{--                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />--}}
                        {{--                                            </svg>--}}
                        {{--                                        </button>--}}
                        {{--                                        <button class="">--}}
                        {{--                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 mt-0 w-4 h-4">--}}
                        {{--                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />--}}
                        {{--                                            </svg>--}}
                        {{--                                        </button>--}}
                        {{--                                    </td>--}}
                        {{--                                </tr>--}}

                        {{--                                </tbody>--}}
                        {{--                            @empty--}}
                        {{--                                <p>No post found</p>--}}
                        {{--                            @endforelse--}}
                        {{--                        </table>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
