<html>
<body>
    <h1>Forecast Notifier</h1>
    @if(!empty($items))
        @foreach($items as $item)
            <div style="border: #1a202c solid 1px">
                <p><b>Number: </b>{{$item->mobile_number}}</p>
                <p><b>Date: </b>{{$item->schedule_date}}</p>
                <p><b>Location: </b>{{$item->location}}</p>
            </div>
        @endforeach
    @else
        <a href="/forecast/create">Create Forecast Notification</a>
    @endif
</body>
</html>
