<!DOCTYPE html>
<html>
<head>
    <title>New RSVP Notification</title>
</head>
<body>
<h1>New RSVP Notification</h1>
<p>A new RSVP has been made for the event: {{ $event->title }}</p>
<p>Date: {{ $event->event_date }}</p>
<p>Total RSVPs: {{ $rsvpCount }}</p>
</body>
</html>
