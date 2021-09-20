<html>
<body>
<h1>Create Character</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="/app-of-holding/character">
    @csrf
    <label>Name:</label>
    <input name="name" type="text">
    <br>
    <label>Strength</label>
    <input name="strength" type="number">
    <br>
    <button type="submit">Create Character</button>
</form>
</body>
</html>
