<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <h1>Welcome, <?= $_SESSION['username'] ?? 'Guest' ?>!</h1>
    <p>You are logged in ✅</p>
    <a href="/login/logout">Logout</a>
</body>
</html>
