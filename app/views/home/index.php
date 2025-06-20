<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Welcome, <?= $_SESSION['username'] ?? 'User' ?>!</h1>
    <a href="/login/logout">Logout</a>
</body>
</html>
