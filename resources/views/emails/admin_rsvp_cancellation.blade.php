<!DOCTYPE html>
<html>
<head>
    <title>RSVP Cancellation Notification</title>
</head>
<body>
<h1>RSVP Cancellation Notification</h1>
<p>An RSVP for the event: {{ $event->title }} has been cancelled.</p>
<p>Date: {{ $event->event_date }}</p>
<p>Total RSVPs remaining: {{ $rsvpCount }}</p>
</body>
</html>
