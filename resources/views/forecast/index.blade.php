<html>
    <body>
        <h1>Forecast Notifier</h1>
            @if(!empty($items))
                @foreach($items as $item)
                   <div style="border: #1a202c solid 1px">
                       <p><b>Number: </b>{{$item->phoneNumber}}</p>
                       <p><b>Date: </b>{{$item->date->format('d-m-y')}}</p>
                       <p><b>Location: </b>{{$item->locationId}}</p>
                   </div>
                @endforeach
            @else
                <a href="/forecast/create">Create Forecast Notification</a>
            @endif
    </body>
</html>
