<?php

class Home extends Controller {

    public function index() {
      
        if (!isset($_SESSION['auth'])){
            header('Location: /login');
            exit;
        
        }

        $this->view('home/index');
    }

}
