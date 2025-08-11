<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/AdminStyle.css">
    <link rel="stylesheet" href="css/modals.css">

</head>

<body>
    <div class="modal fade show" id="serModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <div class="slider">
        <div class="container" style="--bs-gutter-x: 0rem;">
            <button type="button" class="close2" onclick="closeSlider()">×</button>
            <div class="d-flex flex-wrap align-items-center flex-column" style="width:100%">
                <a href="/"
                    class="d-flex align-items-center justify-content-center mb-2 mb-lg-0 text-white text-decoration-none flex-column"
                    style="cursor:default">
                    <img src="../images/logo/logo1.png" alt="" class="bi me-2" width="40%" role="img"
                        aria-label="Bootstrap">
                    <img src="../images/logo/logoName.png" alt="" class="bi me-2" width="60%" role="img"
                        aria-label="Bootstrap">
                </a>
            </div>
            <hr style="color: white; background: white; height: 0.2vh;">

            <ul class="nav nav-pills flex-column mb-auto" style="gap:10px">
                <li onclick="dashboard()">
                    <a href="#dashboard" class="nav-link d-flex align-items-center" aria-current="page">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-house-fill" viewBox="0 0 16 16" style="margin-right:10px">
                            <path
                                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                            <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li onclick="users()">
                    <a href="#users" class="nav-link d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-people-fill" viewBox="0 0 16 16" style="margin-right:10px">
                            <path
                                d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                        </svg>
                        Users
                    </a>
                </li>
                <li onclick="appointments()">
                    <a href="#appointments" class="nav-link d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-list-ul" viewBox="0 0 16 16" style="margin-right:10px">
                            <path fill-rule="evenodd"
                                d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                        </svg>
                        Appointments
                    </a>
                </li>
                <li onclick="addService()">
                    <a href="#service" class="nav-link d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-border-all" viewBox="0 0 16 16" style="margin-right:10px">
                            <path d="M0 0h16v16H0zm1 1v6.5h6.5V1zm7.5 0v6.5H15V1zM15 8.5H8.5V15H15zM7.5 15V8.5H1V15z" />
                        </svg>
                        Add Services
                    </a>
                </li>
                <li onclick="addGallery()">
                    <a href="#gallery" class="nav-link d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-image" viewBox="0 0 16 16" style="margin-right:10px">
                            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                            <path
                                d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                        </svg>
                        Add Gallery
                    </a>
                </li>
                <hr style="color: white; background: white; height: 0.2vh;">
                <li onclick="logout('../SignupLogin/logout.php')" style="margin-top: 20px;">

                    <a href="#" class="d-flex align-items-center logoutbtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white"
                            class="bi bi-box-arrow-right" viewBox="0 0 16 16" style="margin-right:10px">
                            <path fill-rule="evenodd"
                                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                            <path fill-rule="evenodd"
                                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                        </svg>
                        <h5 style="color:white">LOGOUT</h5>
                    </a>

                </li>
            </ul>

        </div>
    </div>

    <div class="p-3 top-nav">
        <button class="top_navBtn" onclick="openSlider()">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-list"
                viewBox="0 0 16 16">
                <path fill-rule="white" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
            </svg>
        </button>
    </div>
    <div class="mainContent">
        <div id="dashboard">
            </button>
            <h1>Dashboard</h1>
            <div class="dashBox">
                <div class="box">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                        class="bi bi-people-fill" viewBox="0 0 16 16" style="margin-right:10px">
                        <path
                            d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                    </svg>
                    <h2>Total Users</h2>
                    <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'GlamX') or die('Unable to connect!');

                    $sql = "SELECT * from users";
                    $result = $conn->query($sql);
                    $count = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                            $count = $count + 1;
                        }
                    } else {
                        $count = 0;
                    }
                    echo '<p>' . $count . '</p>';
                    mysqli_close($conn);

                    ?>
                </div>
                <div class="box">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                        class="bi bi-list-ul" viewBox="0 0 16 16" style="margin-right:10px">
                        <path fill-rule="evenodd"
                            d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                    </svg>
                    <h2>Total Appointments</h2>
                    <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'GlamX') or die('Unable to connect!');

                    $sql = "SELECT * from appointment";
                    $result = $conn->query($sql);
                    $count = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                            $count = $count + 1;
                        }
                    } else {
                        $count = 0;
                    }
                    echo '<p>' . $count . '</p>';
                    mysqli_close($conn);
                    ?>
                </div>
                <div class="box">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                        class="bi bi-border-all" viewBox="0 0 16 16" style="margin-right:10px">
                        <path d="M0 0h16v16H0zm1 1v6.5h6.5V1zm7.5 0v6.5H15V1zM15 8.5H8.5V15H15zM7.5 15V8.5H1V15z" />
                    </svg>
                    <h2>Total Services</h2>
                    <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'GlamX') or die('Unable to connect!');
                    $sql = "SELECT * from services";
                    $result = $conn->query($sql);
                    $count = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                            $count = $count + 1;
                        }
                    } else {
                        $count = 0;
                    }
                    echo '<p>' . $count . '</p>';
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
        <div id="userTable">
            <h1>Users</h1>
            <table>
                <thead>
                    <tr>
                        <th scope="col">
                            Sr.
                        </th>
                        <th scope="col">
                            Name
                        </th>
                        <th scope="col">
                            Email
                        </th>
                        <th scope="col">
                            Password
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $connection = mysqli_connect('localhost', 'root', '', 'GlamX') or die('Unable to connect!');

                    $query = 'SELECT * FROM users';
                    $result = mysqli_query($connection, $query) or die('Error in query: ' . mysqli_error($connection));

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_row($result)) {
                            echo '<tr>';
                            echo '<td>' . ($row[0]) . '</td>';
                            echo '<td>' . ($row[1]) . '</td>';
                            echo '<td>' . ($row[2]) . '</td>';
                            echo '<td>' . ($row[3]) . '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo 'No rows found!';
                    }
                    mysqli_free_result($result);

                    mysqli_close($connection);
                    ?>
                </tbody>

            </table>
        </div>
        <div id="appointmentTable">
            <h1>Appointments</h1>
            <table>
                <thead>
                    <tr>
                        <th>
                            Sr
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Contact
                        </th>
                        <th>
                            Services
                        </th>
                        <th>
                            Date
                        </th>
                        <th>
                            Time
                        </th>
                        <th>
                            TotalPrice
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $connection = mysqli_connect('localhost', 'root', '', 'GlamX') or die('Unable to connect!');

                    $query = 'SELECT * FROM appointment';
                    $result = mysqli_query($connection, $query) or die('Error in query: ' . mysqli_error($connection));

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_row($result)) {
                            echo '<tr>';
                            echo '<td>' . ($row[0]) . '</td>';
                            echo '<td>' . ($row[1]) . '</td>';
                            echo '<td>' . ($row[2]) . '</td>';
                            echo '<td>' . ($row[3]) . '</td>';
                            echo '<td>' . ($row[4]) . '</td>';
                            echo '<td>' . ($row[5]) . '</td>';
                            echo '<td>' . ($row[6]) . '</td>';
                            echo '<td>' . ($row[7]) . '</td>';
                            echo '</tr>';
                        }
                        echo '</table>';
                    } else {
                        echo 'No rows found!';
                    }

                    mysqli_free_result($result);

                    mysqli_close($connection);
                    ?>

                </tbody>
            </table>

        </div>
        <div id="service">
            <h1>Services</h1>
            <button class="addBtn" type="button" onclick="addSerModal()">Add Service</button>
            <table>
                <thead>
                    <tr>
                        <th>
                            Sr
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Price(Rs)
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $connection = mysqli_connect('localhost', 'root', '', 'GlamX') or die('Unable to connect!');

                    $query = 'SELECT * FROM services';
                    $result = mysqli_query($connection, $query) or die('Error in query: ' . mysqli_error($connection));

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_row($result)) {
                            echo '<tr>';
                            echo '<td>' . ($row[0]) . '</td>';
                            echo '<td>' . ($row[1]) . '</td>';
                            echo '<td>' . ($row[2]) . '</td>';
                            echo '<td><a style="color:white; text-decoration:none" href="#" 
                            onclick="editServices(\'' . htmlspecialchars($row[1]) . '\'); 
                            return true;">
                            <button class="btn btn-primary">Edit</button></a></td>';

                            echo '<td><a style="color:white; text-decoration:none" href="delete/deleteService.php?s_name=' . ($row[0]) . '"><button class="btn btn-danger" >Delete</button></a></td>';
                            echo '</tr>';
                        }
                        echo '</table>';
                    } else {
                        echo 'No rows found!';
                    }

                    mysqli_free_result($result);

                    mysqli_close($connection);
                    ?>
                </tbody>
            </table>
        </div>
        <div id="gallery">
            <h1>Gallery</h1>
            <button class="addBtn" type="button" onclick="addGalleryImg()">Add Image</button>
            <table>
                <thead>
                    <tr>
                        <th>
                            Sr
                        </th>
                        <th>
                            Id
                        </th>
                        <th>
                            Image
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $connection = mysqli_connect('localhost', 'root', '', 'GlamX') or die('Unable to connect!');

                    $query = 'SELECT * FROM gallery';
                    $result = mysqli_query($connection, $query) or die('Error in query: ' . mysqli_error($connection));

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<tr>';
                            echo '<td>' . ($row["sr"]) . '</td>';
                            echo '<td>' . ($row["gal_id"]) . '</td>';
                            $fileName = $row["gal_img"];
                            $imageUrl = "../images/gallery/" . $fileName;
                            echo '<td><img class="img" src="' . $imageUrl . '"</td>';
                            echo '<td>
                            <a style="color:white; text-decoration:none" href="#" 
                            onclick="editGalleryImg(\'' . htmlspecialchars($row["gal_id"]) . '\'); 
                            return true;">
                            <button class="btn btn-primary">Edit</button></a></td>';


                            echo '<td><a style="color:white; text-decoration:none" href="delete/deleteGalimg.php?gal_id=' . ($row["gal_id"]) . '"><button class="btn btn-danger">Delete</button></a></td>';
                            echo '</tr>';
                        }
                        echo '</table>';
                    } else {
                        echo 'No rows found!';
                    }

                    mysqli_free_result($result);

                    mysqli_close($connection);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="js/modals.js"></script>
    <script src="js/AdminScript.js"></script>
    <script src="js/slider.js"></script>
</body>

</html>