<?php

class Login extends Controller {

    public function index() {		

	    $this->view('login/index');
    }
    
	 public function verify() {
			 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
					 $username = trim($_POST['username'] ?? '');
					 $password = trim($_POST['password'] ?? '');

					 if ($username && $password) {
							 $user = $this->model('User');

							 // ✅ Debugging output to verify values
							 echo "Entered password: " . $password . "<br>";

							 // Grab stored hash to double-check
							 $db = db_connect();
							 $stmt = $db->prepare("SELECT password FROM users WHERE username = :username");
							 $stmt->bindValue(':username', $username);
							 $stmt->execute();
							 $row = $stmt->fetch(PDO::FETCH_ASSOC);

							 if ($row) {
									 echo "Stored hash: " . $row['password'] . "<br>";
									 var_dump(password_verify($password, $row['password']));
							 } else {
									 echo "❌ User not found.";
							 }

							 die(); // Stop for debug
					 } else {
							 echo "⚠️ Username and password are required.";
					 }
			 } else {
					 header("Location: /login");
					 exit;
			 }
	 }
}