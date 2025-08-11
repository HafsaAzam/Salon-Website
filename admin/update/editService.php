<?php
$connection = mysqli_connect('localhost', 'root', '', 'GlamX') or die('Unable to connect!');
$name = $_POST['s_name'];

$query = "SELECT 'serPrice' FROM services WHERE serName = '$name'";
$result = mysqli_query($connection, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $record = mysqli_fetch_assoc($result);
} else {
    die('Record not found!');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $price = $_POST['s_price'];

    $updateQuery = "UPDATE services SET serPrice = $price WHERE serName = '$name'";

    if (mysqli_query($connection, $updateQuery)) {
        header("Location: ../admin.php");
        exit();
    } else {
        echo 'Error updating record: ' . mysqli_error($connection);
    }
}

mysqli_close($connection);
