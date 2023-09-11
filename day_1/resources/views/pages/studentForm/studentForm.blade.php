<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Info Form</title>
</head>
<body>
    <div>
        @extends('layouts.app')
        @section('content')
        <form action="{{route('studentForm')}}" method="POST" novalidate>
            {{ csrf_field() }}
            <label for="name">Student Name:</label>
            <input type="text" name="name" value="{{old('name')}}"><br>
            @if ($errors->has("name"))
                <span>
                    <strong>{{$errors->first("name")}}</strong>
                </span>
                <br>
            @endif
            <label for="id">Student ID:</label>
            <input type="text" name="id" value="{{old('id')}}"><br>
            @if ($errors->has("id"))
                <span>
                    <strong>{{$errors->first("id")}}</strong>
                </span>
                <br>
            @endif
            <label for="dept">Department:</label>
            <input type="text" name="dept" value="{{old('dept')}}"><br>
            @if ($errors->has("dept"))
                <span>
                    <strong>{{$errors->first("dept")}}</strong>
                </span>
                <br>
            @endif
            <input type="submit" value="Submit">

        </form>
            
        @endsection
    </div>
</body>
</html>