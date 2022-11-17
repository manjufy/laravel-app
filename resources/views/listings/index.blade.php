<x-layout>
@include('partials._hero')
@include('partials._search')
    {{-- if and unless both would work --}}
    @if (!count($listings))
        <p>No listings found!</p>
    @endif
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @unless (!count($listings))
            @foreach ($listings as $listing)
                <x-listing-card :listing="$listing" />
            @endforeach
        @else
            <p>No listings found</p>
        @endunless
    </div>
</x-layout>