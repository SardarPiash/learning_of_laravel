<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teacher Form</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
        <form action="{{route('teacherForm')}}" method="POST" novalidate>
            {{csrf_field()}}
            <label for="name">Teacher Name:</label>
            <input type="text" name="name" value="{{old('name')}}"><br>
            @if ($errors->has('name'))
                <span>
                    <strong>{{$errors->first('name')}}</strong><br>
                </span>
            @endif

            <label for="id">Teacher Id:</label>
            <input type="number" name="id" value="{{old('id')}}"><br>
            @if ($errors->has('id'))
                <span>
                    <strong>{{$errors->first('id')}}</strong><br>
                </span>
            @endif
            <label for="dept">Department:</label>
            <input type="text" name="dept" value="{{old('dept')}}"><br>
            @if ($errors->has('dept'))
                <span>
                    <strong>{{$errors->first('dept')}}</strong><br>
                </span>
            @endif
            <input type="submit" value="Submit">
        </form>
    @endsection
</body>
</html>