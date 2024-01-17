<?php
require_once "controllerUserData.php";

$email = $_SESSION['email'];

if ($email != false) {
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($connection, $sql);

    if ($run_Sql) {
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $name = $fetch_info['name'];
        $bio = $fetch_info['bio'];
        // Add more fields as needed

        // Check if the logout parameter is set
        if (isset($_GET['logout'])) {
            // Unset all session variables
            session_unset();

            // Destroy the session
            session_destroy();

            // Redirect to the login page
            header('Location: index.php');
            exit;
        }
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title><?php echo $name ?> | Edit Profile | CSLearn</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <!-- Add any additional styles if needed -->
            <style>
                /* Your global styles (you can copy the styles from your previous code) */
                body {
                    background-color: #fff;
                    color: #232836;
                    font-family: Arial, sans-serif;
                }

                /* Edit Profile Page Styles */
                .profile {
                    padding: 50px 0;
                }

                .card {
                    border: none;
                    border-radius: 10px;
                    box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.2);
                }

                .card-header {
                    background-color: #f44336;
                    color: #fff;
                    text-align: center;
                    padding: 20px;
                }

                .card-body {
                    text-align: center;
                }

                label {
                    font-size: 18px;
                    margin-top: 10px;
                }

                input[type="text"],
                textarea {
                    width: 100%;
                    padding: 10px;
                    margin: 5px 0 20px 0;
                    display: inline-block;
                    border: 1px solid #ccc;
                    box-sizing: border-box;
                }

                button {
                    background-color: #f44336;
                    color: white;
                    padding: 12px 20px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                    font-size: 16px;
                }

                button:hover {
                    background-color: #45a049;
                }
            </style>
        </head>
        <body>
<!-- Header -->
<section class="header">
    <nav>
        <a href="home.php"><img src="images/Logo.png" alt=""></a>
        <div class="nav-links" id="navLinks">
            <i class="fa-solid fa-xmark" onclick="hideMenu()"></i>
            <ul>
                <li><a href="home.php">HOME</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="courses.php">COURSE</a></li>
                <li><a href="logout-user.php">LOGOUT</a></li>
            </ul>
        </div>
        <i class="fa-solid fa-bars" onclick="showMenu()"></i>
    </nav>
            <!-- Include your header code here -->

<!-- Edit Profile Section -->
<section class="profile">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2>Edit <?php echo $name ?>'s Profile</h2>
                    </div>
                    <div class="card-body">
                        <!-- Add form elements for editing profile details -->
                        <form action="update_profile.php" method="post" enctype="multipart/form-data">
                            <label for="name">Name:</label>
                            <input type="text" name="name" value="<?php echo $name ?>" required>

                            <label for="bio">Bio:</label>
                            <textarea name="bio"><?php echo $bio ?></textarea>


                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Footer-->
    <section class="footer">
        <h4>About Us</h4>
        <p>
            CSLearn: Your go-to destination for simplified computer science education.
        </p>
        <div class="icons">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-github"></i>
        </div>
    </section>

            <!-- Add any additional scripts if needed -->
        </body>
        </html>
        <?php
    } else {
        echo "Error fetching user information.";
    }
} else {
    header('Location: index.php');
}
?>
