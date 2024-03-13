<?php declare(strict_types=1);

namespace App\Livewire\Component;

use App\Models\Candidate;
use App\Services\GithubService;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

final class CandidateSearchComponent extends Component
{
    public string $location = '';

    public string $language = '';

    public string $repos = '';

    private GithubService $http;

    public array $results;

    public array $cursor;

    public function __construct()
    {
        $this->http = new (GithubService::class);
    }

    public function mount(): void
    {
        $this->repos = session('repos', '');
        $this->language = session('language', '');
        $this->location = session('location', '');

        $query = "type:user repos:>$this->repos language:$this->language location:$this->location is:public ";
        $cacheKey = 'github.search:' . md5($query);

        $this->results = Cache::get($cacheKey) ?? [];
    }

    public function render(): View|Application
    {
        return view('livewire.component.candidate-search-component')
            ->layout('layouts.app');
    }

    public function search(string $cursor = null)
    {
        $search = $this->handleQuery($cursor);

        $results = $this->http->getData($search);

        if (isset($results['errors'])) {
            session()->flash('error', 'No results found');
            return back();
        }

        $this->results = $results['data']['search']['edges'];

        $this->cursor = $results['data']['search']['pageInfo'];
    }

    public function nextPage(): void
    {
        if ($this->cursor['hasNextPage']) {
            $this->search($this->cursor['endCursor']);
        }
    }

    public function clear(): void
    {
        $this->language = '';
        $this->location = '';
        $this->repos = '';
        session(['repos' => '', 'language' => '$this->language', 'location' => '$this->location']);

    }

    public function handleQuery($cursor): string
    {
        $query = "type:user repos:>$this->repos language:$this->language location:$this->location is:public ";
        session(['repos' => $this->repos, 'language' => $this->language, 'location' => $this->location]);
        $after = $cursor ? ", after: \"$cursor\"" : "";
        return "{search(query: \"$query\", type: USER, first: 10, $after) {
        pageInfo {
            hasNextPage
            endCursor
            hasPreviousPage
            startCursor
        }
        userCount
        edges {
            node {
                ... on User {
                    email
                    bio
                    location
                    name
                    avatarUrl
                    repositoriesContributedTo {
                        totalCount
                    }
                }
            }
        }
    }}";

    }

    public function save($candidate): void
    {
        $candidate = Candidate::where('name', $candidate['name'])->first();

        if ($candidate->name === $candidate['name']) {
            session()->flash('error', "Candidato já favoritado.");
            $this->redirectRoute('search');
        } else {
            Candidate::create([
                'user_id' => auth()->user()->id,
                'name' => $candidate['name'],
                'avatarUrl' => $candidate['avatarUrl'],
                'email' => $candidate['email'],
                'bio' => $candidate['bio'],
                'location' => $candidate['location'],
                'contributed_count' => $candidate['repositoriesContributedTo']['totalCount'],
            ]);
            session()->flash('sucess', 'Candidato Favoritado!');
            $this->redirectRoute('search');
        }
    }
}
