<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>User: {{$application->user->name}}</h1>
    <p>Id: {{$application->id}}</p>
    <h1>Subject: {{$application->subject}}</h1>
    <p>Subject: {{$application->message}}</p>
    <img src="{{$application->file_url}}" alt="">
</body>
</html>