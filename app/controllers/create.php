<?php

class Create extends Controller {

    public function index() {		
	    $this->view('create/index');
    }

  public function register() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $user = $this->model('User');

      $username = $_POST['username'] ?? '';
      $password = $_POST['password'] ?? '';

      $user->create_user($username, $password);
      
    }
  }
}
