<?php
session_start();

$connection = mysqli_connect('localhost', 'root', '', 'GlamX') or die('Unable to connect!');

if (isset($_SESSION['username'])) {
    $userEmail = $_SESSION['username'];

    $query = "SELECT * FROM appointment WHERE userEmail = '$userEmail' ORDER BY appDate ASC";
    $result = mysqli_query($connection, $query) or die('Error in query: ' . mysqli_error($connection));

    $futureAppointments = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $appDate = $row['appDate'];
        $today = date('Y-m-d');

        if (strtotime($appDate) >= strtotime($today)) {
            $futureAppointments[] = $row;
        }
    }

    if (count($futureAppointments) > 0) {
        // Show name/email from the first future appointment
        $userName = htmlspecialchars($futureAppointments[0]['userName']);
        $userEmail = htmlspecialchars($futureAppointments[0]['userEmail']);

        echo "<div class='user-info'>";
        echo "<div class='row1'><label>Name: </label><span> $userName</span></div>";
        echo "<div class='row1'><label>Gmail: </label><span> $userEmail</span></div>";
        echo "</div>";

        foreach ($futureAppointments as $row) {
            echo "<div class='appointment-block'>";
            echo "<div class='row1'><label>Service:</label><span> " . htmlspecialchars($row['servicesName']) . "</span></div>";
            echo "<div class='row1'><label>Date: </label><span> " . htmlspecialchars($row['appDate']) . "</span></div>";
            echo "<div class='row1'><label>Time: </label><span> " . htmlspecialchars($row['appTime']) . "</span></div>";
            echo "<div class='row1'><label>Total Price: </label><span> Rs. " . htmlspecialchars($row['totalPrice']) . "</span></div>";
            echo "</div>";
        }
    } else {
        echo "<div class='row1'>No upcoming reservations found.</div>";
    }

    mysqli_free_result($result);
} else {
    echo "<div class='row1'>Not logged in.</div>";
}

mysqli_close($connection);
?>
