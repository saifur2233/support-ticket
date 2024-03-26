<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
</head>
<body>
    <h1>Welcome to Customer Dashboard</h1>

    <form action="{{ route('customer-logout') }}" method="post">
        @csrf
        <input type="submit" value="Logout">
    </form>
</body>
</html>