<?php

use App\Models\User;

it('should be able to give a permission to a user', function () {
    // Arrange
    $user = User::factory()->create();

    // Act
    $user->givePermissionTo('search-candidates');

    // Assert
    expect($user->hasPermissionTo('search-candidates'))->toBeTrue();
    $this->assertDatabaseHas('permissions', [
        'permission' => 'search-candidates',
    ]);
});
