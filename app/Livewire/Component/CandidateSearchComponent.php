<?php declare(strict_types=1);

namespace App\Livewire\Component;

use App\Models\Candidate;
use App\Services\GithubService;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

final class CandidateSearchComponent extends Component
{
    use AuthorizesRequests;

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

    public function render(): View|Application
    {
        $this->authorize('searcher', auth()->user());

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
        $results = Candidate::where('name', $candidate['name'])->first();

        if ($results === null) {
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
        } else {
            session()->flash('error', "Candidato já favoritado.");
            $this->redirectRoute('search');
        }
    }
}
