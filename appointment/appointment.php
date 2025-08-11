<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="appointment.css">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&family=Quicksand:wght@300..700&family=Tangerine:wght@400;700&display=swap" rel="stylesheet">
    <title>Appointment</title>
</head>

<body>
    <div class="appointment" id="appointment">
        <div class="row1-appointment">
            <h3>Book an</h3>
            <h1>Appointment</h1>
        </div>
        <div class="row2-appointment">
            <form id="form-appointment" action="addAppointment.php" method="POST">
                <div class="app-boxHeading">
                    <h3>PERSONAL INFORMATION : </h3>
                </div>
                <hr class="hr-app">
                <div class="app-box1">
                    <div class="box1-1">
                        <label for="fname" class="app-col">First Name : </label>
                        <input type="text" name="fname" class="app-col" required>
                    </div>
                    <div class="box1-1">
                        <label for="lname" class="app-col column3">Last Name : </label>
                        <input type="text" name="lname" class="app-col">
                    </div>

                    <div class="box1-1">
                        <label for="email" class="app-col column1">Email : </label>
                        <input type="email" name='email' class="app-col" required>
                    </div>

                    <div class="box1-1">
                        <label for="contact" class="app-col">Contact Number:</label>
                        <input type="tel" name="contact" class="app-col" required>
                    </div>
                </div>

                <div class="app-boxHeading pt-app">
                    <h3>SERVICES : </h3>
                </div>
                <hr class="hr-app">

                <div class="app-box3">
                    <?php
                    $connection = mysqli_connect('localhost', 'root', '', 'GlamX') or die('Unable to connect!');

                    $query = 'SELECT * FROM services';
                    $result = mysqli_query($connection, $query) or die('Error in query: ' . mysqli_error($connection));

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div>';
                            echo '<input type="checkbox" name="services[]" value="' . $row['serName'] . '">' . $row['serName'] . ' - Rs.' . $row['serPrice'] . '<br>';
                            echo '</div>';
                        }
                    } else {
                        echo 'No rows found!';
                    }

                    mysqli_free_result($result);

                    mysqli_close($connection);
                    ?>
                </div>

                <div class="app-boxHeading pt-app">
                    <h3>DATE and TIME : </h3>
                </div>
                <hr class="hr-app">
                <div class="app-box4">
                    <label for="date" class="column1">Date : </label>
                    <input type="date" name="date" class="column2" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" required>

                    <label for="time" class="column1">Time : </label>
                    <input type="time" name="time" class="column2" min="09:00" max="21:00" required>
                </div>
                <hr class="hr-app">
                <div class="app-box6">
                    <div class="box6-1">
                        <button type="reset">RESET</button>
                        <button type="submit">SUBMIT</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>