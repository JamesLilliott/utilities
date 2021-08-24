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

    <form method="post" action="/forecast">
        @csrf
        <label>Phone Number:</label>
        <input name="mobile_number" type="text">
        <br>
        <label>Notification Date:</label>
        <input name="schedule_date" type="date">
        <br>
        <x-forecast-location-select/>
        <br>
        <button type="submit">Create Notification</button>
    </form>
</body>
</html>
