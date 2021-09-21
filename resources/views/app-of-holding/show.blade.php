<html>
<body>
<h1>Character</h1>

<a href="/app-of-holding/character/create">Create Character </a>

<div style="border: #1a202c solid 1px">
    <p><b>Name: </b>{{$character->name}}</p>
    <p><b>Strength: </b>{{$character->strength}}</p>
    <form method="POST" action="{{'/app-of-holding/character/delete/' . $character->id}}">
        @csrf
        <button type="submit">Delete</button>
    </form>
</div>

</body>
</html>
