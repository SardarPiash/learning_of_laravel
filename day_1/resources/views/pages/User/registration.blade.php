<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
</head>
<body>
    <fieldset>
        <legend>Registration Here</legend>
        <form action="{{ route('registrationForm') }}" method="POST" novalidate>
            @csrf
            <label for="name">User Name:</label>
            <input type="text" name="name" value="{{ old('name') }}"><br>
            @if ($errors->has('name'))
                <span>
                    <strong>{{ $errors->first('name') }}</strong><br>
                </span>
            @endif

            <label for="email">Email:</label>
            <input type="text" name="email" value="{{ old('email') }}"><br>
            @if ($errors->has('email'))
                <span>
                    <strong>{{ $errors->first('email') }}</strong><br>
                </span>
            @endif

            <label for="password">Password:</label>
            <input type="password" name="password"><br>
            @if ($errors->has('password'))
                <span>
                    <strong>{{ $errors->first('password') }}</strong><br>
                </span>
            @endif

            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="none" {{ old('status') == 'none' ? 'selected' : '' }}>None</option>
               <option value="student" {{ old('status') == 'student' ? 'selected' : '' }}>Student</option>
                <option value="teacher" {{ old('status') == 'teacher' ? 'selected' : '' }}>Teacher</option>
            </select><br>
            @if ($errors->has('status'))
                <span>
                    <strong>{{ $errors->first('status') }}</strong><br>
                </span>
            @endif

            <label for="dept">Department:</label>
            <input type="text" name="dept" value="{{ old('dept') }}"><br>
            @if ($errors->has('dept'))
                <span>
                    <strong>{{ $errors->first('dept') }}</strong><br>
                </span>
            @endif

            <input type="submit" value="Submit">
        </form>
    </fieldset>
</body>
</html>
