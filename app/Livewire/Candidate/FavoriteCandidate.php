<?php

declare(strict_types=1);

namespace App\Livewire\Candidate;

use App\Models\Candidate;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
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

    public function candidateRemove(Candidate $candidate): void
    {
        if (auth()->user()->id === $candidate->user_id || auth()->user()->hasPermissionTo('admin')) {

            $candidate->delete();

            session()->flash('success', 'Candidato excluído com sucesso!');

            $this->redirectRoute('favorite');
        } else {

            session()->flash('error', 'Você não pode excluir esse candidato!');

            $this->redirectRoute('favorite');
        }

    }
}
