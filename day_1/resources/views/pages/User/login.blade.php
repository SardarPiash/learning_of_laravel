<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <fieldset>
        <legend>Login Here</legend>
        <form action="{{ route('loginForm') }}" method="POST" novalidate>
            @csrf
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
            <input type="submit" value="Submit">
        </form>
    </fieldset>
</body>
</html>
