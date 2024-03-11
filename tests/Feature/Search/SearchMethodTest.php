<?php

use App\Livewire\Component\CandidateSearchComponent;
use App\Services\GithubService;

it('tests the search method in CandidateSearchComponent', function () {
    $githubServiceMock = Mockery::mock(GithubService::class);
    $githubServiceMock->shouldReceive('getData')
        ->once()
        ->andReturn([
            'userCount' => 1,
            'edges' => [
                'node' => [
                    'email' => 'test@example.com',
                    'bio' => 'Test bio',
                    'location' => 'Test location',
                    'name' => 'Test name',
                    'avatarUrl' => 'https://example.com/avatar.jpg',
                    'repositoriesContributedTo' => [
                        'totalCount' => 1
                    ]
                ]
            ]
        ]);

    $component = new CandidateSearchComponent();
    $component->http = $githubServiceMock;

    $component->repos = '10';
    $component->language = 'PHP';
    $component->location = 'Brazil';

    $component->search();
    expect($component->results)->toBeArray()
        ->and($component->results['userCount'])->toBe(1)
        ->and($component->results['edges']['node']['email'])->toBe('test@example.com');
});
