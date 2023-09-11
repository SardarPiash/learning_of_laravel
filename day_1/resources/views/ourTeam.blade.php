<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Our Team</title>
</head>
<body>
    <div>
        @extends('layouts.app')
        @section('content')
            <h2>Our Team Members:</h2>
            <ul>
                @foreach ($employee as $n)
                <li>Name: {{$n}}</li>
                @endforeach
            </ul>
        @endsection
    </div>
</body>
</html>