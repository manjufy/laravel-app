<x-layout>
@include('partials._search')
    @unless (empty($data))
    <a href="/" class="inline-block text-black ml-4 mb-4">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10">
            <div
                class="flex flex-col items-center justify-center text-center"
            >
                <img
                    class="w-48 mr-6 mb-6"
                    src={{ $data->logo ? asset('storage/'. $data->logo) : asset('images/no-image.png') }}
                    alt=""
                />

                <h3 class="text-2xl mb-2">{{ $data->title }}</h3>
                <div class="text-xl font-bold mb-4">{{ $data->company }}</div>
                {{-- Tags Component --}}
                <x-listing-tags :tagsCsv="$data->tags" class="px-3 py-1 mr-2" />
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{ $data->location }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Job Description
                    </h3>
                    <div class="text-lg space-y-6">
                        <p>{{ $data->description }}</p>

                        <a
                            href="mailto:{{ $data->email }}"
                            class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-envelope"></i>
                            Contact Employer</a
                        >

                        <a
                            href="{{ $data->website }}"
                            target="_blank"
                            class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-globe"></i> Visit
                            Website</a
                        >
                    </div>
                </div>
            </div>
        </x-card>
        <x-card class="mt-4 p-2 flex space-x-6">
            <a href="/listings/{{$data->id}}/edit">
                <i class="fa-solid fa-pencil"></i> Edit
            </a>

            <form method="POST" action="/listings/{{$data->id}}">
                @csrf
                @method('DELETE')
                <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
            </form>
        </x-card>
    </div>
    @else
        <p>Not found</p>
    @endunless
</x-layout>