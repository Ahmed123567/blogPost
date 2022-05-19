<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Mail</title>
</head>
<body>
    <h1>Contact message</h1>

    <p>Name: {{$user->name }}</p>
    <p>Email: {{$user->email }}</p>

    <p>
        {{$user->message}}
    </p>
    
</body>
</html>