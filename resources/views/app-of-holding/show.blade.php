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
<div>
    <h3>Inventory</h3>
    @foreach($character->inventory()->get() as $item)
        <p><b>Name: </b>{{$item->name}}</p>
        <p><b>Description: </b>{{$item->description}}</p>
        <p><b>Weight: </b>{{$item->weight}}</p>
        <p><b>Cost: </b>{{$item->cost}}</p>
    @endforeach

</div>

</body>
</html>
