<?php

declare(strict_types=1);

namespace App\Livewire\Candidate;

use App\Models\Candidate;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;
use Livewire\WithPagination;

class FavoriteCandidate extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public $id;
    protected object $candidates;

    public function render(): View
    {
        $this->authorize('searcher');
        $this->candidates = Candidate::with('user')
            ->orderBy('name')
            ->get();
        return view('livewire.pages.candidate.favorite-candidate', [
            'candidates' => $this->candidates,
        ]);
    }

    public function candidateRemove(Candidate $candidate): Redirector|Application|RedirectResponse
    {
        $candidate = $candidate->findOrFail($candidate->id);

        if (empty($candidate)) {

            session()->flash('error', 'Candidato não encontrado ou não pode ser excluído!');

            return redirect()->route('favorite');

        }

        $candidate->delete();

        session()->flash('success', 'Candidato excluído com sucesso!');

        return redirect()->route('favorite');
    }
}
