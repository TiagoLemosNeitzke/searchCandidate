<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

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

it('should be able to authorize access to a route based on the permission', function () {
    // Define a route
    Route::get('test-something', function () {
        return 'test';
    })->middleware('permission:search-candidates');

    $user = User::factory()->createOne();

    // Test access to a route WITHOUT permission
    $responseWithoutPermission = test()->actingAs($user)->get('test-something');
    expect($responseWithoutPermission->status())->toBe(403);

    $user->givePermissionTo('search-candidates');

    // Test access to a route WITH permission
    $responseWithPermission = test()->actingAs($user)->get('test-something');
    expect($responseWithPermission->status())->toBe(200);
});
