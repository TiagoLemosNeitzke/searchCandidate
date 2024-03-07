<?php

namespace App\Livewire\Component;

use Livewire\Component;

class CandidateSearchComponent extends Component
{

    public function render()
    {
        return view('livewire.component.candidate-search-component')
            ->layout('layouts.app');
    }
}
