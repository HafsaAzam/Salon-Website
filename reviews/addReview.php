<?php
$connection = mysqli_connect('localhost', 'root', '', 'GlamX') or die('Unable to connect to the database!');

if (isset($_POST["submit"])) {
    $fullName = mysqli_real_escape_string($connection, $_POST["fullname"]);
    $email = mysqli_real_escape_string($connection, $_POST["email"]);
    $msg = mysqli_real_escape_string($connection, $_POST["msg"]);

    // ✅ Check if both fullName and email match a record in users table
    $emailCheckQuery = "SELECT * FROM users WHERE userName = '$fullName' AND userEmail = '$email'";
    $emailResult = mysqli_query($connection, $emailCheckQuery);

    if (mysqli_num_rows($emailResult) > 0) {
        // ✅ Get new serial number for review
        $sql = "SELECT MAX(sr) AS max_value FROM reviews";
        $result = mysqli_query($connection, $sql);

        if ($result && $row = mysqli_fetch_assoc($result)) {
            $newSr = $row['max_value'] + 1;

            // ✅ Insert review
            $insertQuery = "INSERT INTO reviews (sr, review_name, review_email, review_msg) 
                            VALUES ($newSr, '$fullName', '$email', '$msg')";

            if (mysqli_query($connection, $insertQuery)) {
                header("Location: ../index.php");
                exit();
            } else {
                echo "Error: Failed to insert review.";
            }
        } else {
            echo "Error: Failed to retrieve serial number.";
        }
    } else {
        echo "<script>
            alert('Error: User donot exist.');
            window.location.href = '../index.php';
        </script>";
    }
} else {
    echo "Invalid request.";
}
