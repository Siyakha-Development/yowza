<!DOCTYPE html>
<html>
<head>
    <title>RSVP Cancellation Confirmation</title>
</head>
<body>
<h1>RSVP Cancellation Confirmation</h1>
<p>Your RSVP for the event: {{ $event->title }} has been successfully cancelled.</p>
<p>Date: {{ $event->event_date }}</p>
<p>Location: {{ $event->location }}</p>
</body>
</html>
