<?php declare(strict_types=1);

namespace App\Livewire\Component;

use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

final class CandidateSearchComponent extends Component
{
    public string $location = '';
    public string $language = '';
    public string $repos = '';

    public $results = [];

    public function render(): View|Application
    {
        return view('livewire.component.candidate-search-component')
            ->layout('layouts.app');
    }

    public function search()
    {
        //todo: preciso montar a query de busca na api graphQl do github

        $query = "type:user repos:>$this->repos language:$this->language location:$this->location is:public ";
        $search = "{search(query: \"$query\", type: USER, first: 10) {
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

        $result = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('github.token'),
            'Content-Type' => 'application/json'])
            ->post('https://api.github.com/graphql', ['query' => $search])
            ->json();

        $this->results = $result['data']['search']['edges'];
//dd($this->results);
    }
}
