<?php
$profile_path = "profile_images";
$profile_file = $profile_path . basename($_FILES["profile"]["name"]); // basename - operating system part
$uploadCheck = true;
if ($uploadCheck) {
    $succOrNot = move_uploaded_file($_FILES["profile"]["name"], $profile_file);
    if ($succOrNot == true) {
        # code...
    } else {
        echo "Sorry, there was an error uploading your files";
    }
}
?>
