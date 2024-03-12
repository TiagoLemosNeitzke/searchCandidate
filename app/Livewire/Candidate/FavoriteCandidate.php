<?php

declare(strict_types = 1);

namespace App\Livewire\Candidate;

use App\Models\Candidate;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;

class FavoriteCandidate extends Component
{
    use WithPagination;

    public $id;
    protected object $candidates;
    
    public function render(): View
    {
        $this->candidates = Candidate::with('user')
        ->where('user_id', auth()->user()->id)
        ->orderBy('name')
        ->paginate();

        return view('livewire.pages.candidate.favorite-candidate',[
            'candidates' => $this->candidates,
        ]);
    }

    public function candidateRemove(Candidate $candidate): Redirector|Application|RedirectResponse
    {
        $candidate = $candidate->findOrFail($candidate->id);

        if(empty($candidate)){

            session()->flash('error', 'Candidato não enncontrado e não pode ser excluído!');

           return redirect()->route('candidate.favorite');

        }

        $candidate->delete();

        session()->flash('success', 'Candidato excluído com sucesso!');

        return redirect()->route('candidate.favorite');
    }
}
