<?php
$connection = mysqli_connect('localhost', 'root', '', 'GlamX') or die('Unable to connect!');

$id = $_GET['s_name'];

$query = "DELETE FROM services WHERE serSr = '$id'";

if (mysqli_query($connection, $query)) {
    header("Location: ../admin.php");
} else {
    echo '<script>alert("Error deleting record: ");</script>' . mysqli_error($connection);
}

mysqli_close($connection);
