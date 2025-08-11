<?php
$connection = mysqli_connect('localhost', 'root', '', 'GlamX') or die('Unable to connect!');

$id = $_GET['gal_id'];

$query = "DELETE FROM gallery WHERE gal_id = '$id'";

if (mysqli_query($connection, $query)) {
    header("Location: ../admin.php");
} else {
    echo '<script>alert("Error deleting record: ");</script>' . mysqli_error($connection);
}

mysqli_close($connection);
