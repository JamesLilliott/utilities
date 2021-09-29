<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<body class="antialiased">
    <a href="{{url('logout')}}">logout</a>
    <br>
    <br>
    <a href="{{url('forecast')}}">Forecast Notifier</a>
    <br>
    <a href="{{url('app-of-holding/character')}}">App of Holding</a>
</body>
</html>
