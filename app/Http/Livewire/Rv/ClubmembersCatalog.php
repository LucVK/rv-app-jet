<?php

namespace App\Http\Livewire\Rv;

use App\Models\Rv\ClubMember;
use Livewire\Component;
use Livewire\WithPagination;

class ClubmembersCatalog extends Component
{
    public function render()
    {
        $members = ClubMember::with([
            'clubmemberships' => [
                'season',
                'department',
            ]
        ])->paginate(15);


        return view('livewire.rv.clubmembers-catalog', [
            'clubmembers' => $members
        ]);
    }
}
