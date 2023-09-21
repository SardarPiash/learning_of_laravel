<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log in</title>
</head>
<body>
    <h2>Log in</h2><fieldset>
        <legend>Login Here</legend>
        <form action="{{ route('loginFormSubmission') }}" method="POST" novalidate>
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
            @if ($errors->has('logerror'))
                <span>
                    <strong>{{ $errors->first('logerror') }}</strong><br>
                </span>
            @endif
        </form>
    </fieldset>
</body>
</html>