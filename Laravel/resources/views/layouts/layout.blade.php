<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Open Sans', sans-serif;
        }
    </style>
</head>
<body>

<nav>
    <a href="/">Terug naar home</a>
    <a href="/playlist">Tijdelijke Afspeellijst</a>
    <a href="/login">Inloggen</a>
    @auth
        <a href="/savedPlaylists">Opgeslagen afspeellijsten</a>
        <a href="/dashboard">Dashboard</a>
    @endauth
</nav>

<h1>Jukebox</h1>

@yield('content')

</body>
</html>