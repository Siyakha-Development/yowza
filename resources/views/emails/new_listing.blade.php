<!DOCTYPE html>
<html>
<head>
    <title>New Listing Notification</title>
</head>
<body>
<h1>{{ $listing->title }}</h1>
<p>{{ $listing->description }}</p>
<p>Price: ${{ $listing->price }}</p>
@if ($listing->product_image)
    @foreach (json_decode($listing->product_image) as $image)
        <img src="{{ asset('storage/' . $image) }}" alt="Listing Image" style="max-width: 100%;">
    @endforeach
@endif
</body>
</html>
