<html>
    <body>
        <h1>Forecast Notifier</h1>
        <h3>Notification Stored</h3>
        <p>Number: {{$forecastInquiry->mobile_number}}</p>
        <p>Location: {{$forecastInquiry->location}}</p>
        <p>Date: {{$forecastInquiry->schedule_date->format('d-m-Y')}}</p>
    </body>
</html>
