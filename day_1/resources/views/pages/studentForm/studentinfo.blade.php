<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Info</title>
</head>
<body>
    <div>
        @extends('layouts.app')
        @section('content')
            <h2>Student Info</h2>
            <ul>
                <li>Name: {{$name}}</li>
                <li>ID : {{$id}}</li>
                <li>Depatment: {{$dept}}</li>
            </ul>
        @endsection
    </div>
</body>
</html>