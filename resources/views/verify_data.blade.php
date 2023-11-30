<!-- resources/views/verify_data.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verify Data</title>

    <!-- Include your stylesheets, scripts, or other head elements here -->

</head>
<body>
    <div class="container">

        <h1>Verify Data</h1>

        <!-- Update the form action to a route that doesn't require authentication -->
        <form method="get" action="{{ route('verify.search') }}">

            @csrf

            <div class="mb-3">
                <label for="id" class="form-label">Search by ID:</label>
                <input type="text" class="form-control" id="id" name="id">
            </div>

            <button type="submit" class="btn btn-primary">Search</button>

        </form>

        <a href="{{ route('all.data') }}" class="btn btn-info mt-3">Show All Data</a>

    </div>

    <!-- Include your scripts or other body elements here -->

</body>
</html>
