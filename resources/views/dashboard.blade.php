<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<body class="antialiased">
    <a href="{{url('logout')}}">logout</a>
    <br>
    <a href="{{url('forecast')}}">Forecast Notifier</a>
</body>
</html>
