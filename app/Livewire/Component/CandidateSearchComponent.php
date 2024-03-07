<?php declare(strict_types=1);

namespace App\Livewire\Component;

use App\Services\GithubService;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

final class CandidateSearchComponent extends Component
{
    public string $location = '';
    public string $language = '';
    public string $repos = '';
    protected ?string $pagination = 'fsdfsdfd';

    protected $http;

    public $results = [];

    public function __construct()
    {
        $this->http = new (GithubService::class);
    }

    public function render(): View|Application
    {
        return view('livewire.component.candidate-search-component')
            ->layout('layouts.app');
    }

    public function search(): void
    {
        $query = "type:user repos:>$this->repos language:$this->language location:$this->location is:public ";

        $search = "{search(query: \"$query\", type: USER, first: 30) {
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
                 totalCount }
                  }}}}}";
        $result = $this->http->getData($search);

        if ($result === []) {
            session()->flash('error', 'No results found');
        }

        $this->results = $result;

    }

    public function save(string $candidate)
    {
        dd($candidate);
    }
}
