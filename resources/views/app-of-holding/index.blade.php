<html>
<body>
<h1>Characters</h1>

<a href="/app-of-holding/character/create">Create Character </a>

@if(!empty($characters))
    @foreach($characters as $character)
        <div style="border: #1a202c solid 1px">
            <p><b>Name: </b>{{$character->name}}</p>
            <p><b>Strength: </b>{{$character->strength}}</p>
            <a href="{{'/app-of-holding/character/' . $character->id}}">View</a>
        </div>
    @endforeach
@endif
</body>
</html>
