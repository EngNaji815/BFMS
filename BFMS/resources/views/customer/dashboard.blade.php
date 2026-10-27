<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Dashboard</title>
</head>
<body>

    <h1>Customer Dashboard</h1>

    <p>Welcome, {{ auth()->user()->name }}</p>
    <p>Your role: {{ auth()->user()->role }}</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>
</html>