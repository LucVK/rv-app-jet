<?php

namespace App\Http\Livewire\Rv\Clubmembers;

use App\Actions\Rv\CreateClubmemberInformation;
use Livewire\Component;

class CreateClubmemberForm extends Component
{
        /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];

    public function createClubmember(CreateClubmemberInformation $creator)
    {
        $creator->create($this);
    }

    public function render()
    {
        return view('rv.clubmembers.create-clubmember-form');
    }
}
