<?php declare(strict_types=1);

namespace App\Livewire\Component;

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

    private $http;

    public $results;

    public $cursor = "";

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

    public function search(string $cursor = null): void
    {
        $query = "type:user repos:>$this->repos language:$this->language location:$this->location is:public ";

        session(['repos' => $this->repos, 'language' => $this->language, 'location' => $this->location]);
        $after = $cursor ? ", after: \"$cursor\"" : "";
        $search = "{search(query: \"$query\", type: USER, first: 10, $after) {
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

        $results = $this->http->getData($search);

        $this->results = $results['edges'];

        $this->cursor = $results['pageInfo'];

        if ($this->results === []) {
            session()->flash('error', 'No results found');
        }
    }

    public function clear(): void
    {
        $this->language = '';
        $this->location = '';
        $this->repos = '';
        session(['repos' => '', 'language' => '$this->language', 'location' => '$this->location']);

    }

    public function save(string $candidate): void
    {
        dd($candidate);
    }
}
