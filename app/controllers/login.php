<?php

class Login extends Controller {

		public function index() {
				$this->view('login/index');
		}

		public function check() {
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
						$user = $this->model('User');  
						$username = $_POST['username'];
						$password = $_POST['password'];

						$auth = $user->authenticate($username, $password);

						if ($auth === true) {
								header("Location: /home");
							exit();
						} else {
								$error = is_string($auth) ? $auth : "❌ Invalid credentials.";
								$this->view('login/index', ['error' => $error]);
						}
				}
		}


		public function create() {
				$this->view('create/index');
		}

		public function store() {
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
						$user = $this->model('User'); 

						$result = $user->create($_POST['username'], $_POST['password']);
						if ($result === true) {
								header("Location: /login");
						} else {
								$this->view('create/index', ['error' => $result]);
						}
				}
		}

		public function logout() {
				session_destroy();
				header("Location: /login");
		}
}
