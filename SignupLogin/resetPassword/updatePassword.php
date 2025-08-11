<?php
// Open connection to MySQL server
$connection = mysqli_connect('localhost', 'root', '', 'GlamX') or die('Unable to connect!');

// Get input values
$name = $_POST['Username'] ?? '';
$password = $_POST['pass'] ?? '';
$password2 = $_POST['pass2'] ?? '';

// Validate inputs
if (empty($name) || empty($password) || empty($password2)) {
    die('Username and both password fields are required.');
}

// Check if passwords match
if ($password !== $password2) {
    die('Passwords do not match!');
}

// Check if the user exists
$selectQuery = "SELECT userPassword FROM users WHERE userEmail = ?";
$selectStmt = mysqli_prepare($connection, $selectQuery);
mysqli_stmt_bind_param($selectStmt, "s", $name);
mysqli_stmt_execute($selectStmt);
mysqli_stmt_store_result($selectStmt);

if (mysqli_stmt_num_rows($selectStmt) === 0) {
    die('User does not exist!');
}

// Update the user's password
$updateQuery = "UPDATE users SET userPassword = ? WHERE userEmail = ?";
$updateStmt = mysqli_prepare($connection, $updateQuery);
mysqli_stmt_bind_param($updateStmt, "ss", $password, $name);

if (mysqli_stmt_execute($updateStmt)) {
    header("Location: ../login/login.php");
    exit();
} else {
    echo 'Error updating record: ' . mysqli_error($connection);
}

// Close statements and connection
mysqli_stmt_close($selectStmt);
mysqli_stmt_close($updateStmt);
mysqli_close($connection);
