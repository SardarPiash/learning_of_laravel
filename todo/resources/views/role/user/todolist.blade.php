<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... (head section) ... -->
</head>
<body>
    <div>
        <h2>ToDo List for: {{$name}}</h2>
        <ul>
            @foreach ($list as $item)
            <li>ToDo: {{$item['todo']}}</li>
            <li>Date: {{$item['date']}}</li>
            @endforeach
        </ul>
    </div>
</body>
</html>
