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

    public function search(): void
    {
        $query = "type:user repos:>$this->repos language:$this->language location:$this->location is:public ";

        session(['repos' => $this->repos, 'language' => $this->language, 'location' => $this->location]);

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

        $cacheKey = 'github.search:' . md5($query);

        $result = Cache::remember($cacheKey, 60, function () use ($search) {
            return $this->http->getData($search);
        });

        if ($result === []) {
            session()->flash('error', 'No results found');
        }

        $this->results = $result;

        $this->clear();
    }

    /* public function search(): void
     {
         $query = "type:user repos:>$this->repos language:$this->language location:$this->location is:public ";

         session(['repos' => $this->repos, 'language' => $this->language, 'location' => $this->location]);

         $cursor = null;
         $results = [];

         do {
             $search = "{search(query: \"$query\", type: USER, first: 30) {
             pageInfo {
                 endCursor
                 hasNextPage
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
                  totalCount }
                   }}}}}";

             $cacheKey = 'github.search:' . md5($query . $cursor);

             $result = Cache::remember($cacheKey, 60, function () use ($search) {
                 return $this->http->getData($search);
             });
             if ($result === []) {
                 session()->flash('error', 'No results found');
             }
 dump($result);
             $results = array_merge($results, $result['edges']);
             $cursor = $result['pageInfo']['endCursor'];
         } while ($result['pageInfo']['hasNextPage']);

         $this->results = $results;

         $this->clear();
     }*/

    public function clear(): void
    {
        $this->language = '';
        $this->location = '';
        $this->repos = '';
        session(['repos' => '', 'language' => '$this->language', 'location' => '$this->location']);

    }

    public function save(string $candidate)
    {
        dd($candidate);
    }
}
