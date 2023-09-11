@extends('layouts.app')
@section('content')
<h2>Our Service:</h2>
<ul>
    <li>{{$name}}</li>
    <li>{{$email}}</li>
    <li>{{$occupation}}</li>
    <h4>Services:</h4>
    <ol>
        @foreach ($services as $item)
            <li>{{$item}}</li>
        @endforeach
    </ol>
</ul>

@endsection
