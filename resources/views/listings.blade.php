@extends('layout')

@section('content')
    <h1>{{ $heading }}</h1>

    {{-- if and unless both would work --}}
    @if (!count($listings))
        <p>No listings found!</p>
    @endif

    @unless (!count($listings))
        @foreach ($listings as $listing)
            <h2><a href="/listings/{{$listing['id']}}"> {{ $listing['title'] }}</h2></a>
            <p>{{ $listing['description'] }}</p>
            <hr/>
        @endforeach
    @else
        <p>No listings found</p>
    @endunless
@endsection