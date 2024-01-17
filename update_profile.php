<?php
require_once "controllerUserData.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $bio = $_POST['bio'];

    // Check if the required fields are not empty
    if (empty($name) || empty($bio)) {
        // Redirect back to the edit profile page with an error message
        header('Location: edit_profile.php?error=Please fill out all the fields');
        exit;
    }

    $email = $_SESSION['email'];

    if ($email != false) {
        // Check if a file was uploaded
        if ($_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
            $profile_image = $_FILES['profile_image']['name'];

            // Specify the directory to save the uploaded file
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($profile_image);

            // Check if the file already exists
            if (file_exists($target_file)) {
                // Redirect back to the edit profile page with an error message
                header('Location: edit_profile.php?error=Sorry, file already exists.');
                exit;
            }

            // Move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file)) {
                // File upload successful, update the profile image in the database
                $update_image_query = "UPDATE usertable SET profile_image='$target_file' WHERE email='$email'";
                $update_image_result = mysqli_query($connection, $update_image_query);

                if (!$update_image_result) {
                    // Redirect back to the edit profile page with an error message
                    header('Location: edit_profile.php?error=Error updating profile image.');
                    exit;
                }
            } else {
                // Redirect back to the edit profile page with an error message
                header('Location: edit_profile.php?error=Sorry, there was an error uploading your file.');
                exit;
            }
        }

        // Update the name and bio in the database
        $update_query = "UPDATE usertable SET name='$name', bio='$bio' WHERE email='$email'";
        $update_result = mysqli_query($connection, $update_query);

        if (!$update_result) {
            // Redirect back to the edit profile page with an error message
            header('Location: edit_profile.php?error=Error updating profile information.');
            exit;
        }

        // Redirect to the profile page after successful update
        header('Location: profile.php');
        exit;
    } else {
        // Redirect to the login page if email is not set
        header('Location: index.php');
        exit;
    }
} else {
    // Redirect to the edit profile page if accessed without a form submission
    header('Location: edit_profile.php');
    exit;
}
?>
