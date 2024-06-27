<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Inquiry for Your Listing</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f7f7f7;
        margin: 0;
        padding: 0;
    }
    .container {
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
        background-color: #ffffff;
        padding: 20px;
        border: 1px solid #dddddd;
    }
    .header {
        background-color: #007bff;
        color: #ffffff;
        padding: 10px;
        text-align: center;
    }
    .footer {
        background-color: #f7f7f7;
        color: #555555;
        padding: 10px;
        text-align: center;
        font-size: 12px;
    }
</style>
<body>
<h1>New Inquiry for Your Listing: {{ $listing->title }}</h1>
<p>Message: {{ $inquiry['message'] }}</p>
<!-- Display images if available -->
@if ($listing->images)
    <h2>Listing Images</h2>
    <div>
        @foreach ($listing->images as $image)
            <img src="{{ asset('storage/' . $image) }}" alt="Listing Image" style="width: 200px; height: auto; margin: 10px;">
        @endforeach
    </div>
@endif
<div class="footer">
    <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
</div>
</body>
</html>
