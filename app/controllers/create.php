<?php

class Create extends Controller {
    public function index() {
        $this->view('create/index');
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $password = trim($_POST['password'] ?? '');

            if ($username && $password) {
                $user = $this->model('User');
                $message = $user->create_user($username, $password);
                echo $message;
            } else {
                echo "⚠️ Username and password are required.";
            }
        } else {
            header("Location: /create");
        }
    }
}
