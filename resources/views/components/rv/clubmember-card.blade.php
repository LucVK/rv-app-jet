@props(['clubmember', 'year'])

<article
    {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-500 border border-red border-opacity-2 hover:border-opacity-5 rounded-xl']) }}>
    {{-- {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}> --}}
    <div class="py-6 px-5 h-full flex flex-col">
        <div>
            {{ $clubmember->profile->firstname }} {{ $clubmember->profile->lastname }}
        </div>
        <div>
            {{ $clubmember->profile->birthdate }}
        </div>
        <div>
            {{ $clubmember->email }}
        </div>
        <div>
            @foreach ($clubmember->clubmemberships as $membership)
                @if ($membership->season->year == $year)
                    {{ $membership->department->name }}
                @endif
            @endforeach
        </div>
        <div>
            {{ $year }}
        </div>
    </div>
</article>
