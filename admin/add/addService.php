<?php
$connection = mysqli_connect('localhost', 'root', '', 'GlamX') or die('Unable to connect!');

$name = $_POST['s_name'];
$price = $_POST['s_price'];

$sql = "SELECT MAX(serSr) AS max_value FROM services";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $maxValue = $row['max_value'];

    $newMaxValue = $maxValue + 1;

    $query = "INSERT INTO services (serSr,serName, serPrice) VALUES ($newMaxValue,'$name', '$price')";

    if (mysqli_query($connection, $query)) {
        header("Location: ../admin.php");
    } else {
        echo 'Error inserting record: ' . mysqli_error($connection);
    }
}
mysqli_close($connection);
