<html>
<body>
<h1>Forecast Notifier</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="/register">
    @csrf
    <label>Name:</label>
    <input name="name" type="text">
    <br>
    <label>Email</label>
    <input name="email" type="email">
    <br>
    <label>Password</label>
    <input name="password" type="password">
    <br>
    <button type="submit">Create Account</button>
</form>
</body>
</html>
