<h1>{{ $heading }}</h1>
@unless (empty($data))
    <h2>{{ $data['title'] }}</h2>
    <p>{{ $data['description'] }}</p>
@else
    <p>Not found</p>
@endunless

