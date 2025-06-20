<?php

class User {

    public $username;
    public $password;
    public $auth = false;

    public function __construct() {}

    public function test() {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM users;");
        $statement->execute();
        $rows = $statement->fetch(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function authenticate($username, $password) {
        $username = strtolower($username);
        $db = db_connect();

        if (!$db) {
            die("❌ DB connect failed");
        }

        $stmt = $db->prepare("SELECT * FROM users WHERE username = :name");
        $stmt->bindValue(':name', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        echo "Entered password: $password<br>";
        echo "Stored hash: " . $user['password'] . "<br>";

        if ($user && password_verify($password, $user['password'])) {
            echo "✅ Password match!";
        } else {
            echo "❌ Incorrect password!";
        }
        die;
    }
    private function handle_failed_login() {
        if (isset($_SESSION['failedAuth'])) {
            $_SESSION['failedAuth']++;
        } else {
            $_SESSION['failedAuth'] = 1;
        }

        if ($_SESSION['failedAuth'] >= 3) {
            $_SESSION['lockout_time'] = time() + 60; // lockout for 60 seconds
        }
    }

    private function log_attempt($username, $result) {
        $db = db_connect();
        $stmt = $db->prepare("INSERT INTO log (username, attempt, timestamp) VALUES (:username, :attempt, NOW())");
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':attempt', $result); // 'good' or 'bad'
        $stmt->execute();
    }

    public function create_user($username, $password) {
        $db = db_connect();

        $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindValue(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return "⚠️ Username already exists.";
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $hashed_password);
        $stmt->execute();

        return true;
    }
}
