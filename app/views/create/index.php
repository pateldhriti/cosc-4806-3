<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <h2>Create Account</h2>
    <?php if (!empty($data['error'])): ?>
        <p style="color:red;"><?= $data['error'] ?></p>
    <?php endif; ?>
    <form method="POST" action="/login/store">
        <input name="username" placeholder="Username" required><br>
        <input name="password" type="password" placeholder="Password" required><br>
        <button type="submit">Register</button>
    </form>
    <br>
    <a href="/login">Back to login</a>
</body>
</html>
