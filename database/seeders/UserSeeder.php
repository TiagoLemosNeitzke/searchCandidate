<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
        ]);
        $user->givePermissionTo('admin');

             $user = User::factory()->create([
            'name' => 'CTO',
            'email' => 'cto@cto.com',
        ]);
        $user->givePermissionTo('searcher');
        $user->givePermissionTo('searcher-nominator');

        $user = User::factory()->create([
            'name' => 'Selecionador',
            'email' => 'selecionador@selecionador.com',
        ]);
        $user->givePermissionTo('searcher');

    }
}
