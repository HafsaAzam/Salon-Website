<?php
session_start();

$connection = mysqli_connect('localhost', 'root', '', 'GlamX') or die('Unable to connect!');

$email = $_POST['Username'];
$pass = $_POST['Password'];
$remember = isset($_POST['rememberCB']);

$query = "SELECT * FROM users WHERE userEmail = '$email' AND userPassword = '$pass'";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    // $_SESSION['user'] = $email;
    $_SESSION['username'] = $email;

    if ($remember) {
        setcookie("remember_user", $email, time() + (7 * 24 * 60 * 60));
        setcookie("remember_pass", $pass, time() + (7 * 24 * 60 * 60));
    } else {
        setcookie("remember_user", "", time() - 3600);
        setcookie("remember_pass", "", time() - 3600);
    }

    header("Location: ../../index.php");
    exit();
} else if ($email == "admin" || $pass == "admin") {
    header("Location: ../../admin/admin.php");
    exit();
} else {
    echo "Invalid username or password.";
}

mysqli_close($connection);
?>