<div>

    {{-- <livewire:livewire-filters-text :filter="$filters['search']" /> --}}

    {{-- <input wire:model.debounce.1000ms="search"  type="text"> --}}

    @if ($clubmembers->count())

        <div class="lg:grid lg:grid-cols-5 sm:grid sm:grid-cols-3">

            @foreach ($clubmembers as $clubmember)
                {{-- <x-clubmember-card :clubmember="$clubmember" class="{{ $loop->iteration < 3 ? 'col-span-1' : 'col-span-1' }}" /> --}}

                <div>
                    {{ $clubmember->profile->firstname . ' ' . $clubmember->profile->lastname }}
                </div>
            @endforeach

        </div>
        {{ $clubmembers->links() }}
    @else
        <p class="text-center">Geen clubmembers.</p>
    @endif


</div>
