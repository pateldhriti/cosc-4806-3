<?php

class Home extends Controller {

    public function index() {
        // ✅ Ensure session is active
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // ✅ Redirect if not authenticated
        if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== 1) {
            header('Location: /login');
            exit;
        }

        $this->view('home/index');
    }

}
