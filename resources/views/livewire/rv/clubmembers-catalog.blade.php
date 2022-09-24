<div class="grid grid-cols-12 border-0 border-red-600">

    <div class="border-0 border-green-600 col-span-2">
        <div class="grid grid-cols-1">
            <p class="m-2  text-lg"> Afdelingen </p>
            <div><livewire:livewire-filters-checkbox :filter="$filters['department']" /></div>
            <p class="m-2  text-lg"> Jaargang </p>
            <div class="mr-4 "> <livewire:livewire-filters-select :filter="$filters['season']" /> </div>
            <p class="m-2  text-lg"> Naam </p>
            <div class="mr-4 "> <livewire:livewire-filters-text :filter="$filters['search']" /> </div>
            <div class="m-3" wire:loading>Ophalen gegevens....</div>
        </div>

    </div>
    {{-- <livewire:livewire-filters-text :filter="$filters['search']" /> --}}

    {{-- <input wire:model.debounce.1000ms="search"  type="text"> --}}

    <div class="border-0 border-green-600 col-span-10">

        @if ($clubmembers->count())
            <div class="grid grid-cols-3 sm:grid sm:grid-cols-3 bottom-2 ">
                @foreach ($clubmembers as $clubmember)
                    <x-rv.clubmember-card :clubmember="$clubmember" :year="$year"
                        class="{{ $loop->iteration < 3 ? 'col-span-1' : 'col-span-1' }}" />
                @endforeach
            </div>
            <div class="mt-3">
                {{ $clubmembers->links() }}
            </div>
        @else
            <p class="text-center">Geen clubmembers.</p>
        @endif
    </div>

</div>
