<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GithubService
{
    public function getData(string $search): array
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('github.token'),
            'Content-Type' => 'application/json'])
            ->post('https://api.github.com/graphql', ['query' => $search])
            ->json();

        return $response;
    }

}
