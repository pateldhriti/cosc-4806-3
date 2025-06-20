<?php

// ✅ Start session only if it's not already started
if (session_status() === PHP_SESSION_NONE) {
    // ✅ These must be set before session_start()
    ini_set('session.gc_maxlifetime', 28800);
    ini_set('session.gc_probability', 1);
    ini_set('session.gc_divisor', 1);
    session_set_cookie_params(28800); // 8 hours
    session_start();
}

require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'core/config.php';
require_once 'database.php';