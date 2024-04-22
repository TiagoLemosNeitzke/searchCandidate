<x-slot name="header">
    <div class="flex items-center justify-between">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Listar Candidatos')}}
        </h2>

            <x-bread-crumb/>

    </div>
</x-slot>
<div class="flex flex-col items-center justify-center mt-12">

    <div class="w-full max-w-2xl">
        <x-success-alert/>
    </div>

    <x-table title="Favoritos" :items="$candidates" :columns="[
        ['label' => 'Avatar', 'column' => 'avatarUrl'],
        ['label' => 'NOME', 'column' => 'name'],
        ['label' => 'EMAIL', 'column' => 'email'],
        ['label' => 'BIO', 'column' => 'bio'],
        ['label' => 'Contribuições', 'column' => 'contributed_count'],
        ['label' => 'Localização', 'column' => 'location'],
        ['label' => 'Quem salvou?', 'column' => ''],
    ]"/>

</div>
