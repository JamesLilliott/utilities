<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body class="antialiased">
        <form action="{{url('login')}}" method="POST">
            @csrf
            <div>
                <label for="email">Email:</label>
                <input type="text" name="email"/>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password"/>
            </div>
            <button type="submit">Login</button>
        </form>
    </body>
</html>
