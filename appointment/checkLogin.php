<?php
session_start();

if (isset($_SESSION['username'])) {
    // User is logged in
    header("Location: appointment.php");
    exit();
} else {
    // Not logged in, redirect to login
    header("Location: ../SignupLogin/login/login.php");
    exit();
}
