<?php
// session_start();
// $_SESSION['seenReservationDot'] = true;
// echo "success";  -->
// <?php
session_start();
if (isset($_SESSION['username'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'GlamX');
    $username = $_SESSION['username'];

    // Mark all user's appointments as seen
    $query = "UPDATE appointment SET seen = 1 WHERE userEmail = '$username'";
    mysqli_query($conn, $query);

    mysqli_close($conn);
}
