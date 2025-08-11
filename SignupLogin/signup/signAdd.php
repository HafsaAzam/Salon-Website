<?php
// open connection to MySQL server
$connection = mysqli_connect('localhost', 'root', '', 'GlamX') or die('Unable to connect!');

$name = $_POST['f_name'] . " " . $_POST['l_name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];

if (empty($name) || empty($email) || empty($pass) || empty($pass2)) {
    die('All fields are required.');
}

// Check if passwords match
if ($pass !== $pass2) {
    die('Passwords do not match!');
}

// Check if email already exists
$check_query = "SELECT * FROM users WHERE userEmail = '$email'";
$check_result = mysqli_query($connection, $check_query);

if (mysqli_num_rows($check_result) > 0) {
    die('User already exists!');
}

// Get max userSr
$sql = "SELECT MAX(userSr) AS max_value FROM users";
$result = mysqli_query($connection, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $maxValue = $row['max_value'];
    $newMaxValue = $maxValue + 1;

    // prepare the insert query
    $query = "INSERT INTO users (userSr, userName, userEmail, userPassword) VALUES ($newMaxValue, '$name', '$email', '$pass')";

    // execute the query
    if (mysqli_query($connection, $query)) {
        header("Location: ../../index.php");
        exit();
    } else {
        echo 'Error inserting record: ' . mysqli_error($connection);
    }
} else {
    echo 'Failed to fetch max user ID.';
}

// close connection to MySQL server
mysqli_close($connection);
?>
