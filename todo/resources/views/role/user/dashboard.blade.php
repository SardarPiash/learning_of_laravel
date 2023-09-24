<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
</head>
<body>
    <div>
        <h2>User Dashboard</h2>
    <ul>
        <li>UserName: {{$name}}</li>
        <li>Email: {{$email}}</li>
        <li>Status: {{$status}}</li>
    </ul>
   <div>
    <form action="{{route('seetodolist')}}" method="POST">
        @csrf
        <input type="submit" value="See ToDo ">
    </form>
    <form action="{{route('addtodo')}}" method="POST">
        @csrf
        <input type="submit" value="Add ToDo ">
    </form>
   </div>
    
    </div>
</body>
</html>
