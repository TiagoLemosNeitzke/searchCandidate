<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'CTO',
            'email' => 'cto@cto.com',
        ]);
        $user->givePermissionTo('searcher');
        $user->givePermissionTo('admin');
        $user->givePermissionTo('searcher-nominator');

        $user = User::factory()->create([
            'name' => 'Selecionador',
            'email' => 'selecionador@selecionador.com',
        ]);
        $user->givePermissionTo('searcher');
    }
}
