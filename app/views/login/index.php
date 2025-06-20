<!DOCTYPE html>
<html>
<head>
		<title>Login</title>
		<link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
		<h2>Login</h2>
		<?php if (!empty($data['error'])): ?>
				<p style="color:red;"><?= $data['error'] ?></p>
		<?php endif; ?>
		<form method="POST" action="/login/check">
				<input name="username" placeholder="Username" required><br>
				<input name="password" type="password" placeholder="Password" required><br>
				<button type="submit">Login</button>
		</form>
		<br>
		<a href="/login/create">Register here</a>
</body>
</html>
