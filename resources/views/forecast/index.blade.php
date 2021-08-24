<html>
    <body>
        <h1>Forecast Notifier</h1>
            @if(!empty($items))
                <select name="city">
                @foreach($items as $item)
                    <option value="{{$item}}">{{$item}}</option>
                @endforeach
                </select>
            @else
                <a href="/forecast/create">Create Forecast Notification</a>
            @endif
    </body>
</html>
