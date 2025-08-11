<?php

$connection = mysqli_connect('localhost', 'root', '', 'GlamX') or die('Unable to connect!');

if ($_POST["submit"]) {
    $fullName = $_POST["img_id"];
    $fileName = $_FILES["gal_img"]["name"];
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowed_Types = array("jpg", "jpeg", "png", "gif","jfif", "JPG", "PNG", "JPEG", "GIF", "JFIF");
    $tempName = $_FILES["gal_img"]["tmp_name"];
    $targetPath = "../../images/gallery/" . $fileName;

    $sql = "SELECT MAX(sr) AS max_value FROM gallery";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $maxValue = $row['max_value'];
        $newMaxValue = $maxValue + 1;

        if (in_array($ext, $allowed_Types)) {
            if (move_uploaded_file($tempName, $targetPath)) {

                $query = "INSERT INTO gallery (sr,gal_id, gal_img) VALUES ($newMaxValue,'$fullName', '$fileName')";

                if (mysqli_query($connection, $query)) {
                    // echo "Your image is inserted";
                    header("Location: ../admin.php");
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
}
