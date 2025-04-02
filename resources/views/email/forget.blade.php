<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Recovery</title>
</head>

<body>
    <h1>Click the link below to recover your email</h1>
    <a href="{{ url(route('recover', ['token' => $user->remember_token])) }}">Here</a>
</body>

</html>
