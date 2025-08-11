<?php
$conn = mysqli_connect('localhost', 'root', '', 'GlamX') or die('Unable to connect!');

$userName = $_POST['fname']." ".$_POST['lname'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$date = $_POST['date'];
$time = $_POST['time'];
$services = $_POST['services'];

$total_price = 0;
if (isset($services) && !empty($services)) {
    foreach ($services as $service_name) {
        $sql = "SELECT serPrice FROM services WHERE serName = '$service_name'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $total_price += $row['serPrice'];
        }
    }
}
$services_list = implode(',', $services);

// ✅ Check if both username and email match a record in users table
$checkUserSql = "SELECT * FROM users WHERE userName = '$userName' AND userEmail = '$email'";
$checkUserResult = mysqli_query($conn, $checkUserSql);

if (mysqli_num_rows($checkUserResult) === 0) {
    echo "<script>
        alert('Error: Username and email do not match our records. Please sign up or correct your details.');
        window.location.href = '../SignupLogin/signup/signup.php';
    </script>";
    exit;
}

// ✅ Get new appointment serial number
$sql = "SELECT MAX(appSr) AS max_value FROM appointment";
$result = $conn->query($sql);
$newMaxValue = 1;

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (!is_null($row['max_value'])) {
        $newMaxValue = $row['max_value'] + 1;
    }
}

// ✅ Insert the appointment
$sql = "INSERT INTO appointment (appSr, userName, userEmail, userContact, servicesName, appDate, appTime, totalPrice) 
        VALUES ($newMaxValue, '$userName', '$email', '$contact', '$services_list', '$date', '$time', '$total_price')";

if (mysqli_query($conn, $sql)) {
    header("Location: ../index.php");
    exit;
} else {
    echo "Error booking appointment: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
