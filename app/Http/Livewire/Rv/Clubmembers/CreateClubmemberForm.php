<?php

namespace App\Http\Livewire\Rv\Clubmembers;

use App\Actions\Rv\ClubMemberActions;
use App\Models\Rv\Department;
use Livewire\Component;

class CreateClubmemberForm extends Component
{
        /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];

    public $selectedDepartment;

    public function createClubmember(ClubMemberActions $creator)
    {
        $creator->create($this->state);
    }

    public function render()
    {
        return view('rv.clubmembers.create-clubmember-form',['departments'=> Department::orderBy('name', 'Asc')->get()]);
    }
}
