<?php
session_start();
if (!isset($_SESSION['admin'])) {
    // dacă nu eşti logat ca admin, du-te pe login
    header('Location: login.php');
    exit;
}
