<x-jet-form-section submit="createClubmember">
    <x-slot name="title">
        Hoe werkt het?
    </x-slot>
    <x-slot name="description">
        {!! __('rv.create_new_clubmember_info') !!}
    </x-slot>
    <x-slot name="form">
        <!-- First Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="firstname" value="{{ __('Firstname') }}" />
            <x-jet-input id="firstname" type="text" class="mt-1 block w-full" wire:model.defer="state.firstname"
                autocomplete="firstname" />
            <x-jet-input-error for="firstname" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="lastname" value="{{ __('Lastname') }}" />
            <x-jet-input id="lastname" type="text" class="mt-1 block w-full" wire:model.defer="state.lastname"
                autocomplete="lastname" />
            <x-jet-input-error for="lastname" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- Department -->
        <div class="col-span-6 sm:col-span-4">
            <div class="form-group row">
                <x-jet-label for="department" value="{{ __('Afdeling') }}" />
                <div class="col-md-6">
                    {{-- <select wire:model="selectedDepartment" class="form-select rounded-md border-gray-300 w-full"> --}}
                    <select id="department" wire:model.defer="state.department"
                        class="form-select rounded-md border-gray-300 w-full">
                        <option value="0" selected>Kies afdeling</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="department" class="mt-2" />
                </div>
            </div>
        </div>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>

    </x-slot>
</x-jet-form-section>
