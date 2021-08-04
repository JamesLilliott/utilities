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
        <input name="phone-number" type="text">
        <br>
        <label>Notification Date:</label>
        <input name="date" type="date">
        <br>
        <select name="location">
            <option value="" selected>Select a Location</option>
            <option value="1">Bolton</option>
        </select>
        <br>
        <button type="submit">Create Notification</button>
    </form>
</body>
</html>
