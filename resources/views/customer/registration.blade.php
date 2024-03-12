<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
</head>
<body>
    <h1>Customer Registration</h1>
    <form action="{{ route('customer-registration-store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Enter Name">
        <input type="text" name="email" placeholder="Enter Email">
        <input type="password" name="password" placeholder="Enter Password">
        <input type="submit" value="Submit">
    </form>
</body>
</html>