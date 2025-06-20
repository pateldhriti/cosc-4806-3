<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <?php
    date_default_timezone_set('America/Toronto'); // change if needed
    $currentDateTime = date("l, F j, Y - h:i A");
    ?>
    
    <h1>Welcome, <?= $_SESSION['username'] ?? 'User' ?>!</h1>
    <p>You are logged in.</p>
    <p><strong>Current Date and Time:</strong> <?= $currentDateTime ?></p>
    
    <a href="/login/logout">Logout</a>
</body>
</html>
