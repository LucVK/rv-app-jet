<?php

namespace App\Http\Livewire\Rv;

use App\Models\Rv\ClubMember;
use App\Models\Rv\Department;
use App\Models\Rv\Season;
use Kirschbaum\LivewireFilters\Filter;
use Kirschbaum\LivewireFilters\HasFilters;
use Livewire\Component;
use Livewire\WithPagination;

class ClubmembersCatalog extends Component
{
    use WithPagination;
    use HasFilters{
        handleUpdateEvent as protected handleUpdateEventFromTrait;
    }

    public function filters(): array
    {
        $departmentNames = Department::orderedNames();
        // array_push($departmentNames, 'Alle');

        $seasons = Season::orderBy('year', 'Desc')->get()->pluck('id','year')->toArray();
        $kk = array_keys($seasons);

        return [
            Filter::make('search'),
            Filter::make('department')->options($departmentNames)->default($departmentNames),
            Filter::make('season')->options(array_keys($seasons))->default(array_key_first($seasons)),
            // Filter::make('status')->options(['published', 'draft'])->default('published'),
        ];
    }


    public function handleUpdateEvent($key, $payload): void
    {
        $this->handleUpdateEventFromTrait($key, $payload);
        $this->resetPage();
    }


    public function render()
    {
        $search = '%'. $this->filters['search']->value . '%';

        // if ($this->isFiltered) {
        //     $this->resetPage();
        // }

        $members = ClubMember::with([
            'clubmemberships' => [
                'season',
                'department',
            ]
            ])
            ->whereHas('clubmemberships', function ($query){
                $query->whereHas('season', function ($query) {
                    $query->where('year',$this->filters['season']->value );
                });
                $query->whereHas('department', function ($query) {
                    $query->whereIn('name',$this->filters['department']->value );
                });
            })
            ->where('name','like',$search)
            ->paginate(15);

        return view('livewire.rv.clubmembers-catalog', [
            'clubmembers' => $members,
            'year' => $this->filters['season']->value,
        ]);
    }
}
