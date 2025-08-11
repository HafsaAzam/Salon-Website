<?php
$connection = mysqli_connect('localhost', 'root', '', 'GlamX') or die('Unable to connect!');

$id = $_POST['gal_id'];

$query = "SELECT 'gal_img' FROM gallery WHERE gal_id = '$id'";
$result = mysqli_query($connection, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $record = mysqli_fetch_assoc($result);
} else {
    die('Record not found!');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $fileName = $_FILES['gal_img']['name'];
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowed_Types = array("jpg", "jpeg", "png", "gif", "JPG", "PNG", "JPEG", "GIF");
    $tempName = $_FILES["gal_img"]["tmp_name"];
    $targetPath = "../../images/gallery/" . $fileName;

    if (in_array($ext, $allowed_Types)) {
        if (move_uploaded_file($tempName, $targetPath)) {

            $query = "UPDATE gallery SET gal_img = '$fileName' WHERE gal_id = '$id'";

            if (mysqli_query($connection, $query)) {
                header("Location: ../admin.php#service? services=success");
            } else {
                echo "Something is wrong";
            }
        } else {
            echo "File is not uploaded";
        }
    } else {
        echo "Your files are not allowed";
    }
}

mysqli_close($connection);
