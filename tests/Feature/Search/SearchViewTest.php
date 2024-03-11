<?php


use App\Models\User;

it('should see the SearchComponent view', function () {
    config(['app.key' => 'base64:' . base64_encode(
            Illuminate\Support\Str::random(32)
        )]);

    $user = User::factory()->create();

    $this->post('/login', [
        'email' => $user->email,
        'password' => $user->password
    ]);

    $this->get('/search')
        ->assertStatus(200)
        ->assertSeeLivewire('component.candidate-search-component');
});
