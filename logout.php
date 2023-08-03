<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
session_unset();
session_destroy();
// session_start();
// session_destroy($_SESSION);
// unset($_SESSION['email']);
// unset($_SESSION['data']);
// unset($_SESSION['project']);
// unset($_SESSION['company_id']);
header("location:index.php");
?>