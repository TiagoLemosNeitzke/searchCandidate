<?php

delare(strict_types=1);

use App\Livewire\UserPermission\UserComponent;
use App\Livewire\Candidate\FavoriteCandidate;
use App\Livewire\Component\CandidateSearchComponent;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Volt::route('/', 'pages.auth.login')
    ->name('login');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::get('/user_permissions', UserComponent::class)->name('user_permissions');

Route::middleware('auth')->group(function (): void {
    Route::get('candidate/search', CandidateSearchComponent::class)->name('candidate.search');
    Route::get('candidate/favorite', FavoriteCandidate::class)->name('candidate.favorite');
});

require __DIR__ . '/auth.php';
